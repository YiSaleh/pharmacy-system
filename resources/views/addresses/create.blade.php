@extends('layouts.admin')

@section('content')
<form role="form"  method="POST" action="{{route('useraddresses.store')}}">
    @csrf
    <!-- input field to insert street name -->
      <div class="card-body">  
        <div class="form-group">
          <label for="streetName">Street name </label>
          <input type="text" class="form-control" id="streetName" placeholder="Enter street name" name="street_name" value="{{old('street_name')}}">
        </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert flate number  -->
        <div class="form-group">
          <label for="FlatNum">Flat Number </label>
          <input type="number" class="form-control" id="FlatNum" placeholder="Enter Flat Number ex:39" name="flat_no" value="{{old('flat_no')}}">
        </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert building number -->
        <div class="form-group">
          <label for="BuildingNum">Building Number </label>
          <input type="number" class="form-control" id="BuildingNum" placeholder="Enter Building Number ex:39" name="building_no" value="{{old('building_no')}}">
        </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert floor number -->
        <div class="form-group">
          <label for="FloorNum">Floor Number </label>
          <input type="number" class="form-control" id="FloorNum" placeholder="Enter Floor Number ex:39" name="floor_no" value="{{old('floor_no')}}">
        </div>
<!-- ############################################################################################################################################## -->
 <!-- radio box to choose whether it is main street or side one -->
      <div class="form-group">
          <label for="InputFloorNum"> Choose whether it main or side</label>
          <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="mainStreet" name="is_main" value="1">
              <label for="mainStreet" class="custom-control-label">Main Street</label><br>
          </div>
          <div class="custom-control custom-radio">
              <input class="custom-control-input" type="radio" id="sideStreet" name="is_main" value="0">
              <label for="sideStreet" class="custom-control-label">Side Street</label>
          </div>        
      </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert user name  by chosing from drop downlist-->
      <div class="form-group">
        <label>Select User </label>
          <select class="form-control" name="user_id">
            @foreach($users as $user)  
              <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
          </select>
      </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert Area name  by chosing from drop downlist-->
      <div class="form-group">
        <label>Select Area </label>
          <select class="form-control" name="area_id">
            @foreach($areas as $area)  
              <option value="{{$area->id}}">{{$area->name}}</option>
            @endforeach
          </select>
      </div>
                 
      <div class="card-footer">
        <button type="submit" class="btn btn-outline-success">Create</button>
      </div>
             
    </div>
</form>

@endsection