<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use App\Pharmacy;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;


class DoctorsController extends Controller
{
    public function index()
    {  
       $user=User::find(Auth::id());
       if($user->hasRole('admin')) {
        $doctors=User::role('doctor')->orderBy('id','asc')->paginate(5);
       }
       elseif ($user->hasRole('owner')) {
        $doctors=User::role('doctor')->where('pharmacy_id',$user->pharmacy_id)->orderBy('id','asc')->paginate(5);
       }
       dd($doctors[0]->pharmacy);
       return view('doctors.index',['doctors'=> $doctors]);
    }

    public function show()
    {
        return view('doctors.show',['doctor'=> User::find(request()->doctor)]);
    }

    public function create()
    {
        return view('doctors.create',['pharmacies' =>  Pharmacy::all() ]);
    }

    public function store(StoreUserRequest $req)
    {   
        $loggedInUser=User::find(Auth::id());
        if($loggedInUser->hasRole('admin'))
        {
            $pharmacyId= $req->pharmacy_id;
        }
        elseif ($loggedInUser->hasRole('owner'))
        {
            $pharmacyId=$loggedInUser->pharmacy_id;
        }
           
        $req['pharmacy_id'] = $pharmacyId;
        $req['password'] = Hash::make($req->password);
        $user = User::create($req->validated());

        if ($req->file('profile_image')->isValid()) {
            $user->avatar= $req->profile_image->store('uploads','public');
        }         

        $user->assignRole('doctor');
        return redirect()->route('doctors.index');
    }
    
    public function edit($doctor)
    {
        return view('doctors.edit',['doctor' => User::find($doctor)]);
    }

    public function update(UpdateUserRequest $request)
    {   
        $avatar= User::where('id',$request->user)->value('avatar');

        if ($request->hasFile('profile_image')&& $request->file('profile_image')->isValid())
        { 
            File::delete(storage_path().'/app/public/'.$avatar);
            $avatar= $request->profile_image->store('uploads','public');
            $request['avatar']=$avatar ;
        }   

        User::where('id',$request->user)->update($request->validated());
        return redirect()->route('doctors.index');

    }

    public function banned()
    {
        $user = User::find(request()->doctor);
        if($user->isNotBanned())
        {  
          $user->ban();
          User::where('id',request()->doctor)->update(['is_banned'=> true]);
        }else {
            $user->unban();
            User::where('id',request()->doctor)->update(['is_banned'=> false]);
        }
        return redirect()->route('doctors.index');
    }


    public function destroy()
    {    
        $avatar=User::where('id',request()->doctor)->value('avatar');
        File::delete(storage_path().'/app/public/'.$avatar);
        User::where('id',request()->doctor)->delete();
        return redirect()->route('doctors.index');
    }
}


