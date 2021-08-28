@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-md-10 offset-1">
        <div class="card">
            <div class="card-header mx-3">
                <h3 class="card-title">
                <span class="text-success"><i class="fas fa-info-circle"></i> Area Details 
                </h3>
            </div> <!-- /.card-header -->
            <div class="card-body mx-5">
                <dl class="row">
                <dt class="col-sm-4">Area Name</dt>
                <dd class="col-sm-8">{{$area->name}}</dd>
                <dt class="col-sm-4">Created At</dt>
                <dd class="col-sm-8">{{$area->created_at}}</dd>
                </dl>
            </div>  <!-- /.card-body -->
        </div>   <!-- /.card -->
    </div> <!-- ./col -->
</div>
@endsection