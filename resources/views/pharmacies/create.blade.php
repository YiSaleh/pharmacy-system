@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('pharmacy.store')}}">
    @csrf
                <div class="card-body">
                <div class="form-group">
                    <label for="name">Pharmacy name </label>
                    <input type="text" class="form-control" id="name" placeholder="Enter pharmacy name" name="name">
                  </div>
                  <div class="form-group">
                        <label>Select Pertority</label>
                        <select class="form-control @error('gender') is-invalid @enderror" name='periority'>
                          <option>High</option>
                          <option>Medium</option>
                          <option>Low</option>
                        </select>
                        <!-- @error('gender') -->
                             <!-- <div class="alert alert-danger">{{ $message }}</div> -->
                        <!-- @enderror -->
                  </div>
                   <div class="form-group">
                    <label>Select Area </label>
                      <select class="form-control" name="area_id">
                        @foreach($areas as $area)  
                          <option value="{{$area->id}}">{{$area->name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label>Select Owner </label>
                      <select class="form-control" name="owner_id">
                        @foreach($owners as $owner)  
                          <option value="{{$owner->id}}">{{$owner->name}}</option>
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