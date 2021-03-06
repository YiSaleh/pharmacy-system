@extends('layouts.admin')

@section('content')
<form role="form"  method="POST" action="{{route('useraddresses.update',['useraddress'=>$useraddress->id])}}">
    @csrf
    @method('PUT')
    <!-- input field to insert street name -->
                <div class="card-body">  
                  <div class="form-group">
                    <label for="exampleInput">Street name </label>
                    <input type="text" class="form-control" id="exampleInput" value="{{$useraddress->street_name}}" name="street_name">
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert flate number  -->
                  <div class="form-group">
                    <label for="InputFlatNum">Flat Number </label>
                    <input type="number" class="form-control" id="InputFlatNum" value="{{$useraddress->flat_no}}" name="flat_no">
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert building number -->
                  <div class="form-group">
                    <label for="InputBuildingNum">Building Number </label>
                    <input type="number" class="form-control" id="InputBuildingNum" value="{{$useraddress->building_no}}" name="building_no">
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert floor number -->
                  <div class="form-group">
                    <label for="InputFloorNum">Floor Number </label>
                    <input type="number" class="form-control" id="InputFloorNum" value="{{$useraddress->floor_no}}" name="floor_no">
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- radio box to choose whether it is main street or side one -->
                  <div class="form-group">
                     <label for="InputFloorNum"> Choose whether it main or side</label>
                     <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="mainStreet" name="mainstreet" value="1" {{ ($useraddress->is_main=="1")? "checked" : "" }}>
                        <label for="mainStreet" class="custom-control-label">Main Street</label><br>
                     </div>
                     <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="sideStreet" name="mainstreet" value="0" {{ ($useraddress->is_main=="0")? "checked" : "" }}>
                        <label for="sideStreet" class="custom-control-label">Side Street</label>
                     </div>        
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert user name  by chosing from drop downlist-->
                  <div class="form-group">
                    <label>Select User </label>
                      <select class="form-control" name="user_id">
                        @foreach($users as $user)  
                          <option value="{{$user->id}}" {{ ($useraddress->user_id === $user->id)? "selected" : "" }}>{{$user->name}}</option>
                        @endforeach
                      </select>
                  </div>
<!-- ############################################################################################################################################## -->
 <!-- input field to insert user name  by chosing from drop downlist-->
                  <div class="form-group">
                    <label>Choose Area </label>
                      <select class="form-control" name="area_id">
                        @foreach($areas as $area)  
                          <option value="{{$area->id}}" {{ ($useraddress->area_id === $area->id)? "selected" : "" }}>{{$area->name}}</option>
                        @endforeach
                      </select>
                  </div>
                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
            </div>
</form>

@endsection