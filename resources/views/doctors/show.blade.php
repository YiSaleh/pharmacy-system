@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-10 offset-sm-1">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title font-weight-bolder">
                <span class="text-success"><i class="fas fa-info-circle"> Doctor Details
                </h3>
            </div> <!-- /.card-header -->
        <div class="card-body">
            <div class="row pb-3">
                    <img class="col-4 ml-5" src="{{ asset('storage/'. $doctor->avatar)}}" style="width:100px; height:250px; border-radius:10%; margin-bottom:3rem;" >
                </div>
                <dl class="row">
                <dt class="col-sm-4">Doctor Name :</dt>
                <dd class="col-sm-8">{{$doctor->name}}</dd>
                <dt class="col-sm-4">Email :</dt>
                <dd class="col-sm-8">{{$doctor->email}}</dd>
                <dt class="col-sm-4">Phone :</dt>
                <dd class="col-sm-8">{{$doctor->phone}}</dd>
                <dt class="col-sm-4">Pharmacy Name :</dt>
                <dd class="col-sm-8">{{$doctor->pharmacy}}</dd>
                <dt class="col-sm-4">Gender :</dt>
                <dd class="col-sm-8">{{$doctor->gender}}</dd>
                <dt class="col-sm-4">Date Of Birth :</dt>
                <dd class="col-sm-8">{{ Carbon\Carbon::parse($doctor->date_of_birth)->format('Y-m-d') }}</dd>
                <dt class="col-sm-4">National Id :</dt>
                <dd class="col-sm-8">{{$doctor->national_id}}</dd>
                <dt class="col-sm-4">Created at :</dt>
                <dd class="col-sm-8">{{$doctor->created_at->toDateString()}}</dd>
                </dl>
            </div>    <!-- /.card-body -->
        </div>    <!-- /.card -->
    </div>  <!-- ./col -->
</div>
@endsection