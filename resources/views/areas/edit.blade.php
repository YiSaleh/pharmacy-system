@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('areas.update',['area'=>$area->id])}}">
    @csrf
        @method('PUT')
        <div class="form-group mx-5">
          <label for="name">Area name </label>
          <input type="text" class="form-control" id="name" name="name" value="{{$area->name}}">
        </div>
        
        <div class="text-center my-5">
          <button type="submit" class="btn btn-outline-primary">Submit</button>
        </div>
      </div>
</form>

@endsection