@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('areas.store'['area'=>$area->id])}}">
    @csrf
        @method('PUT')
        <div class="form-group">
                    <label for="name">Area name </label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$area->name}}">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</form>

@endsection