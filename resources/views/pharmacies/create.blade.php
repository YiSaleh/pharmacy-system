@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('pharmacy.store')}}">
    @csrf
    <div class="card-body">
      <div class="form-group">
          <label for="name">Pharmacy name </label>
          <input type="text" class="form-control" id="name" placeholder="Enter pharmacy name" name="name" value="{{old('name')}}">
          @error('name')
              <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="form-group">
            <label>Pharmacy Priority</label>
            <select class="form-control @error('periority') is-invalid @enderror" name='periority'>
              <option value="High">High</option>
              <option value="Medium">Medium</option>
              <option value="Low">Low</option>
            </select>
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
    </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-outline-success">Save</button>
      </div>
</form>

@endsection