@extends('layouts.admin')

@section('content')
<form role="form"  method="POST" action="{{route('userAddresses.update',['userAddress'=>$userAddress->id])}}">
    @csrf
    @method('PUT')
    <!-- input field to insert street name -->
        <div class="card-body">  
          <div class="form-group">
            <label for="streetName">Street name </label>
            <input type="text" class="form-control" id="streetName" value="{{$userAddress->street_name}}" name="street_name">
          </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert flat number  -->
          <div class="form-group">
            <label for="FlatNum">Flat Number </label>
            <input type="number" class="form-control" id="FlatNum" value="{{$userAddress->flat_no}}" name="flat_no">
          </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert building number -->
          <div class="form-group">
            <label for="BuildingNum">Building Number </label>
            <input type="number" class="form-control" id="BuildingNum" value="{{$userAddress->building_no}}" name="building_no">
          </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert floor number -->
          <div class="form-group">
            <label for="FloorNum">Floor Number </label>
            <input type="number" class="form-control" id="FloorNum" value="{{$userAddress->floor_no}}" name="floor_no">
          </div>
<!-- ############################################################################################################################################## -->
 <!-- radio box to choose whether it is main street or side one -->
          <div class="form-group">
              <label for="streetType"> Choose whether it main or side</label>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="mainStreet" name="is_main" value="1" {{ ($userAddress->is_main=="1")? "checked" : "" }}>
                <label for="mainStreet" class="custom-control-label">Main Street</label><br>
              </div>
              <div class="custom-control custom-radio">
                <input class="custom-control-input" type="radio" id="sideStreet" name="is_main" value="0" {{ ($userAddress->is_main=="0")? "checked" : "" }}>
                <label for="sideStreet" class="custom-control-label">Side Street</label>
              </div>        
          </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert user name  by choosing from drop downList-->
          <div class="form-group">
            <label>Client </label>
              <select class="form-control" name="user_id">
                @foreach($users as $user)  
                  <option value="{{$user->id}}" {{ ($userAddress->user_id === $user->id)? "selected" : "" }}>{{$user->name}}</option>
                @endforeach
              </select>
          </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert user name  by choosing from drop downList-->
          <div class="form-group">
            <label>Area </label>
              <select class="form-control" name="area_id">
                @foreach($areas as $area)  
                  <option value="{{$area->id}}" {{ ($userAddress->area_id === $area->id)? "selected" : "" }}>{{$area->name}}</option>
                @endforeach
              </select>
          </div>
          
          <div class="text-center my-5">
            <button type="submit" class="btn btn-outline-primary">Update</button>
          </div>
    </div>
</form>

@endsection