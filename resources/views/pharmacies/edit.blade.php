@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('pharmacy.update',['pharmacy'=>$pharmacy->id])}}">
    @csrf
        @method('PUT')
        <div class="form-group">
                    <label for="name">Pharmacy name </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$pharmacy->name}}">
                  </div>
                   <div class="form-group">
                        <label>Select Pertority</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name='periority'>
                          <option value="{{$pharmacy->periority}}">{{$pharmacy->periority}}</option>
                          @role('admin')
                          <option>High</option>
                          <option>Medium</option>
                          <option>Low</option>
                          @endrole
                        </select>

                  </div>
                  <div class="form-group">
                    <label>Select Area </label>
                      <select class="form-control" name="area_id">
                        @role('owner')
                        <option value="{{$pharmacy->area_id}}">{{$pharmacy->area->name}}</option>
                        @endrole

                        @role('admin')
                        @foreach($areas as $area)  
                          <option value="{{$area->id}}" {{ ($pharmacy->area_id === $area->id)? "selected" : "" }}>{{$area->name}}</option>
                        @endforeach
                        @endrole
                        
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Select Owner </label>
                      <select class="form-control" name="owner_id">
                        @foreach($owners as $owner)  
                          <option value="{{$owner->id}}" {{ ($pharmacy->owner_id === $owner->id)? "selected" : "" }}>{{$owner->name}}</option>
                        @endforeach
                      </select>
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</form>

@endsection