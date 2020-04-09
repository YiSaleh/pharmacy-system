@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('users.update',['user'=>$user->id])}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
                <div class="card-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">User Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" value="{{$user->name}}" name="name">
                    @error('name')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputPhone">Phone </label>
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="exampleInputPhone" value="{{$user->phone}}" name="phone"> 
                    @error('phone')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputNational">National ID </label>
                    <input type="text" class="form-control @error('national_id') is-invalid @enderror" id="exampleInputNational" value="{{$user->national_id}}" name="national_id"> 
                    @error('national_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
<!-- ################################################################################################################################## -->
                  <div class="form-group">
                    <label for="exampleInputDOB">Date of Birth 1980-01-01 </label>
                    <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="exampleInputDOB" value="{{Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d')}}" name="date_of_birth">
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
                    <label for="exampleInputFile">Upload Photo</label>
                    <div class="input-group">
                       <img  class="col-sm-2 pr-2" src="{{ asset('storage/'. $user->avatar)}}" style="width:100px; height:100px; border-radius:10%; margin-bottom:3rem;">
                      <div class="custom-file ">   
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="profile_image" value="{{$user->avatar}}">
                        <label class="custom-file-label" for="exampleInputFile">Choose File </label>
                      </div>
                    </div>
                    @error('profile_image')
                      <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary"> Update </button>
                </div>
              </form>
            </div>
</form>

@endsection