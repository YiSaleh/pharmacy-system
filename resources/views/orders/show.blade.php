@extends('layouts.app')

@section('content')
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-10 offset-sm-1">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title font-weight-bolder">
                    <i class="fas fa-text-width"></i>
                    Order Details
                    </h3>
                </div>                  

                <!-- /.card-header -->
                <div class="card-body">
                    <dl class="row">
                    <dt class="col-sm-4 font-weight-bolder">User Name :</dt>
                    <dd class="col-sm-8 ">{{$order->user->first->name->name}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Address :</dt>
                    <dd class="col-sm-8 ">{{$order->useraddress->street_name }}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Status:</dt>
                    <dd class="col-sm-8">{{$order->status}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Prescription :</dt>
                    <dd class="col-sm-8">{{$order->prescription}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Created at:</dt>
                    <dd class="col-sm-8">{{$order->created_at}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Updated at :</dt>
                    <dd class="col-sm-8">{{$order->updated_at}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Pharmacy name :</dt>
                    <dd class="col-sm-8">{{$order->pharmacy->name}}</dd>
                    <dt class="col-sm-4 font-weight-bolder">Insurance :</dt>
                    @if($order->is_insured === 1)
                    <dd class="col-sm-8">Insured</dd>
                    @else
                    <dd class="col-sm-8">Not covered</dd>
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