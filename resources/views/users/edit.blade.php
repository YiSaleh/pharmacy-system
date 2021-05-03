@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('users.update',['user'=>$user->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="card-body">
          <div class="form-group">
              <label for="userName">User Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="userName" value="{{$user->name}}" name="name">
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="phone">Phone </label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$user->phone}}" name="phone"> 
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="NationalID">National ID </label>
            <input type="text" class="form-control @error('national_id') is-invalid @enderror" id="NationalID" value="{{$user->national_id}}" name="national_id"> 
            @error('national_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="DOB">Date of Birth 1980-01-01 </label>
            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="DOB" value="{{Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d')}}" name="date_of_birth">
            @error('date_of_birth')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
                <label>Select Gender</label>
                <select class="form-control @error('gender') is-invalid @enderror" name='gender'>
                  <option {{ ($user->gender=="Female")? "selected" : "" }}>Female</option>
                  <option {{ ($user->gender=="Male")? "selected" : "" }}>Male</option>
                </select>
                @error('gender') 
                      <div class="alert alert-danger">{{ $message }}</div>
                @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
              <label for="image">Upload Photo</label>
              <div class="row">
                  <div class="col-sm-2 mx-3 ">
                    <img src="{{ asset('storage/'. $user->avatar)}}" alt="user profile photo" style="width:200px;height:200px; border-radius:10%; margin-bottom:3rem;">
                  </div>
                <div class="col align-self-center">
                  <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror" value="{{$user->avatar}}">
                </div>
              </div>   
                @error('profile_image')
                  <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

        <div class="card-footer">
          <button type="submit" class="btn btn-outline-primary"> Update </button>
        </div>
    </div>
</form>

@endsection