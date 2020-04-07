@extends('layouts.admin')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-10 offset-sm-1">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bolder">
                    <i class="fas fa-text-width"></i>
                    User Address Details
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-sm-4">User Name :</dt>
                    <dd class="col-sm-8">{{$useraddress->User->name}}</dd>
                    <dt class="col-sm-4">Street Name :</dt>
                    <dd class="col-sm-8">{{$useraddress->street_name}}</dd>
                    <dt class="col-sm-4">Building Number :</dt>
                    <dd class="col-sm-8">{{$useraddress->building_no}}</dd>
                    <dt class="col-sm-4">Floor Number :</dt>
                    <dd class="col-sm-8">{{$useraddress->floor_no}}</dd>
                    <dt class="col-sm-4">flat Number :</dt>
                    <dd class="col-sm-8">{{$useraddress->flat_no}}</dd>
                    <dt class="col-sm-4">Street :</dt>
                    @if($useraddress->is_main === 1)
                    <dd class="col-sm-8">Main Street</dd>
                    @else
                    <dd class="col-sm-8">Side Street</dd>
                    @endif
                    </dl>
                </div>
                <!-- /.card-body -->
            </div>
                <!-- /.card -->
        </div>
          <!-- ./col -->
    </div>
</section>
@endsection