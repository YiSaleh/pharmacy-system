@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('pharmacy.update',['pharmacy'=>$pharmacy->id])}}">
    @csrf
        @method('PUT')
        <div class="form-group">
          <label for="name">Pharmacy name </label>
          <input type="text" class="form-control" id="name" name="name" value="{{$pharmacy->name}}">
        </div>
<!-- ##################################################################################################### -->
      @role('admin')
      <div class="form-group">
          <label>Select Pertority</label>
          <select class="form-control @error('gender') is-invalid @enderror" name='periority'>
            <option $pharmacy->periority==High ? "selected" :" ">High</option>
            <option $pharmacy->periority==Medium ? "selected" :" ">Medium</option>
            <option $pharmacy->periority==Low ? "selected" :" ">Low</option>
          </select>
      </div>
      @endrole
<!-- ################################################################################################### -->
        <div class="form-group">
          <label>Area</label>
          @role('owner')
            <input type="hidden" id="area" name="area_id" value="{{$pharmacy->area_id}}" readonly> 
            <input type="text" class="form-control" value="{{$pharmacy->area->name}}" readonly>
          @endrole
          @role('admin')
            <select class="form-control" name="area_id">
              @foreach($areas as $area)  
                <option value="{{$area->id}}" {{ ($pharmacy->area_id === $area->id)? "selected" : "" }}>{{$area->name}}</option>
              @endforeach  
            </select>
            @endrole   
        </div>
<!-- ######################################################################################################################### -->
      <div class="form-group">
        <label>Select Owner </label>
          <select class="form-control" name="owner_id">
            @foreach($owners as $owner)  
              <option value="{{$owner->id}}" {{ ($pharmacy->owner_id === $owner->id)? "selected" : "" }}>{{$owner->name}}</option>
            @endforeach
          </select>
      </div>

      <div class="text-center my-5">
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </div>

    </div>
</form>
@endsection