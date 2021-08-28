@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('owners.update',['user'=>$owner->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <div class="card-body">
          <div class="form-group">
              <label for="ownerName">Owner Name</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="ownerName" value="{{$owner->name}}" name="name">
              @error('name')
                  <div class="alert alert-danger">{{ $message }}</div>
              @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="phone">Phone </label>
            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" value="{{$owner->phone}}" name="phone"> 
            @error('phone')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="nationalID">National ID </label>
            <input type="text" class="form-control @error('national_id') is-invalid @enderror" id="nationalID" value="{{$owner->national_id}}" name="national_id"> 
            @error('national_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
            <label for="DOB">Date of Birth 1980-01-01 </label>
            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="DOB" value="{{Carbon\Carbon::parse($owner->date_of_birth)->format('Y-m-d')}}" name="date_of_birth">
            @error('date_of_birth')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
<!-- ################################################################################################################################## -->
          <div class="form-group">
                <label>Select Gender</label>
                <select class="form-control @error('gender') is-invalid @enderror" name='gender'>
                  <option {{ ($owner->gender=="Female")? "selected" : "" }}>Female</option>
                  <option {{ ($owner->gender=="Male")? "selected" : "" }}>Male</option>
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
                <img src="{{ asset('storage/'. $owner->avatar)}}" style="width:200px;height:200px; border-radius:10%; margin-bottom:3rem;" alt="cannot display user photo">
              </div>
            </div>
            <div class="col align-self-center">
              <input type="file" name="profile_image" class="@error('profile_image') is-invalid @enderror" value="{{$owner->avatar}}">
            </div>
          </div>   
            @error('profile_image')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>

          <div class="text-center mt-5">
            <button type="submit" class="btn btn-outline-primary"> Update </button>
          </div>
  </div>
</form>

@endsection