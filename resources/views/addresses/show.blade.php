@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card">
            <div class="card-header mx-3">
                <h3 class="card-title font-weight-bolder">
                <span class="text-success"><i class="fas fa-info-circle"></i></span> User Address Details
                </h3>
            </div>    <!-- /.card-header -->
            <div class="card-body mx-5">
                <dl class="row">
                <dt class="col-sm-4 font-weight-bolder">User Name :</dt>
                <dd class="col-sm-8 ">{{$userAddress->User->name}}</dd>
                <dt class="col-sm-4 font-weight-bolder">Area Name :</dt>
                <dd class="col-sm-8 ">{{$userAddress->area->name}}</dd>
                <dt class="col-sm-4 font-weight-bolder">Address :</dt>
                <dd class="col-sm-8">{{$userAddress->building_no}} {{$userAddress->street_name}} ,
                  {{$userAddress->floor_no}} flat number {{$userAddress->flat_no}}</dd>
                <dt class="col-sm-4 font-weight-bolder">Street :</dt>
                @if($userAddress->is_main === 1)
                <dd class="col-sm-8">Main Street</dd>
                @else
                <dd class="col-sm-8">Side Street</dd>
                @endif
                </dl>
            </div>
        </div>
    </div>
</div>
@endsection