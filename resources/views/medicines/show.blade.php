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
                    Medicine description
                    </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-sm-4 font-weight-bolder">Drug name</dt>
                    <dd class="col-sm-8 ">{{$medicine->name}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Price</dt>
                    <dd class="col-sm-8 ">{{$medicine->price }}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Quantity</dt>
                    <dd class="col-sm-8">{{$medicine->quantity}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Type</dt>
                    <dd class="col-sm-8">{{$medicine->type}}</dd>
                   
                    </dd>
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