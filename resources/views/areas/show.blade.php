@extends('layouts.admin')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-text-width"></i>
                   Area Details 
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-sm-4">Area Name</dt>
                    <dd class="col-sm-8">{{$area->name}}</dd>
                    <dt class="col-sm-4">Created At</dt>
                    <dd class="col-sm-8">{{$area->created_at}}</dd>
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