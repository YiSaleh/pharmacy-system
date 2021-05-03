@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('areas.store')}}">
    @csrf
    <div class="card-body">
        <div class="form-group">
            <label for="name">Area name </label>
            <input type="text" class="form-control" id="name" placeholder="Enter area name" name="name" value="{{old('name')}}">
          </div>
        <div class='text-center my-4'>
          <button type="submit" class="btn btn-outline-success btn-md">Submit</button>
        </div>
    </div>
</form>
@endsection