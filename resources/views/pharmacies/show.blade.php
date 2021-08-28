@extends('layouts.admin')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header mx-3">
                    <h3 class="card-title">
                    <span class="text-success"><i class="fas fa-info-circle"> Pharmacy Details 
                    </h3>
                </div>    <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row mx-5">
                    <dt class="col-sm-4">Pharmacy Name</dt>
                    <dd class="col-sm-8">{{$pharmacy->name}}</dd>
                    <dt class="col-sm-4">Created At</dt>
                    <dd class="col-sm-8">{{$pharmacy->created_at}}</dd>
                    <dt class="col-sm-4">Priority</dt>
                    <dd class="col-sm-8">{{$pharmacy->periority}}</dd>
                    <dt class="col-sm-4">Area</dt>
                    <dd class="col-sm-8">{{$pharmacy->area ? $pharmacy->area->name : 'not exist'}}</dd>
                   <dt class="col-sm-4">Owner</dt>
                    <dd class="col-sm-8">{{$owner->name}}</dd>
                    </dl>
                </div>   <!-- /.card-body -->
            </div>   <!-- /.card -->
        </div>  <!-- ./col -->
    </div>
</section>
@endsection