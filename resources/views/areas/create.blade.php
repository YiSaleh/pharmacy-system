@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('areas.store')}}">
    @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="areaName">Name</label>
                    <input type="email" class="form-control" id="areaName" placeholder="Enter area Name">
                  </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</form>

@endsection