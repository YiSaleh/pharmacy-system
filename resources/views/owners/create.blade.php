@extends('layouts.admin')

@section('content')
<form role="form" method="POST" enctype="multipart/form-data" action="{{route('owners.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group">
            <label for="ownerName">Owner Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="ownerName" placeholder="Enter user name" name="name" value="{{old('name')}}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="Email">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" id="Email" placeholder="Enter email" name="email" value="{{old('email')}}">
          @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="Password">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" id="Password" placeholder="Password" name="password" value="{{old('password')}}">
          @error('password')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="exampleInputPasswordConfirm">Confirm Password</label>
          <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPasswordConfirm" placeholder="re-enter your Password" name="password_confirmation">
          @error('password_confirmation')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="Phone">Phone </label>
          <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="Phone" placeholder="User phone" name="phone" value="{{old('phone')}}"> 
          @error('phone')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="National">National ID </label>
          <input type="number" class="form-control @error('national_id') is-invalid @enderror" id="National" placeholder="User National Id" name="national_id" value="{{old('national_id')}}"> 
          @error('national_id')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="DOB">Date of Birth 1980-01-01 </label>
          <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="DOB" placeholder="User Date of birth" name="date_of_birth" value="{{old('date_of_birth')}}">
          @error('date_of_birth')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
              <label>Select Gender</label>
              <select class="form-control @error('gender') is-invalid @enderror" name='gender'>
                <option value="Female">Female</option>
                <option value="Male">Male</option>
              </select>
              @error('gender')
                    <div class="alert alert-danger">{{ $message }}</div>
              @enderror
        </div>
<!-- ################################################################################################################################## -->
        <div class="form-group">
          <label for="image">Upload Photo</label>
          <div class="row">
              <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror">
          </div>
          @error('profile_image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
              
        <div class="text-center mt-5">
          <button type="submit" class="btn btn-outline-success"> Create </button>
        </div>
    </div>
</form>

@endsection