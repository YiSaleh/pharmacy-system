@extends('layouts.admin')

@section('content')
<form role="form" method="POST" enctype="multipart/form-data" action="{{route('doctors.store')}}">
    @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Doctor Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter Doctor name" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Enter email" name="email">
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" placeholder="Password" name="password">
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
                    <label for="exampleInputPhone">Phone </label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" placeholder="User phone" name="phone"> 
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputNational">National ID </label>
                    <input type="number" class="form-control @error('national_id') is-invalid @enderror" id="exampleInputNational" placeholder="User National Id" name="national_id"> 
                    @error('national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputDOB">Date of Birth 1980-01-01 </label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="exampleInputDOB" placeholder="Doctor Date of birth" name="date_of_birth">
                    @error('date_of_birth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                        <label>Select Gender</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name='gender'>
                          <option>Female</option>
                          <option>Male</option>
                        </select>
                        @error('gender')
                             <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                  </div>
<!-- ################################################################################################################################## -->
         <!--select pharmacy name to add harmcy id  -->
        @role('admin')
                <div class="form-group">
                    <label>Select Pharmacy </label>
                      <select class="form-control" name="pharmacy_id">
                        @foreach($pharmacies as $pharmacy)  
                          <option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
                        @endforeach
                      </select>
                </div>
        @endrole
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
              
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Create </button>
                </div>
              </form>
            </div>
</form>

@endsection