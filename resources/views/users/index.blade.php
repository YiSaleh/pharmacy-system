@extends('layouts.app')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>User_id</th>
                  <th>Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->national_id}}</td>
                  <td>{{$user->email}}</td>
                  <td>{{$user->phone}}</td>
                  <td>{{$user->gender}}</td>
                  <td>{{Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d')}}</td>
                  <td> <img class="img-circle elevation-2 ml-3" src="{{ asset('storage/'. $user->avatar)}}" style="width:80px; height:80px" alt="User Avatar"></td>
                  <td>{{$user->created_at->toDateString()}}</td>
                  <td class="project-actions text-center "> 
                      <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-sm" href="{{route('users.show',['user'=>$user->id])}}">
                          <i class="fas fa-folder"> </i>View 
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('users.edit',['user'=>$user->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Edit
                      </a>
                      <form method="POST" action="{{route('users.destroy',['user'=>$user->id])}}">
                          @csrf 
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash"></i>Delete</button>
                      </form>
                        <!-- <a href="users.show" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                        <!-- <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->  
                      </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>User_id</th>
                  <th>Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              {!! $users->links() !!}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>    

 @endsection
