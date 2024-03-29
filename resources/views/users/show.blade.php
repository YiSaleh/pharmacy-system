@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-sm-10 offset-sm-1">
        <div class="card">
            <div class="card-header mx-3">
                <h3 class="card-title font-weight-bolder">
                <span class="text-success"><i class="fas fa-info-circle">
                    User Details
                </h3>
            </div>   <!-- /.card-header -->
            <div class="card-body">
                <div class="row pb-3">
                    <img class="col-4 ml-5" src="{{ asset('storage/'. $user->avatar)}}" style="width:100px; height:250px; border-radius:10%; margin-bottom:3rem;" alt="userImage">
                </div>
                <dl class="row mx-5">
                <dt class="col-sm-4">User Name :</dt>
                <dd class="col-sm-8">{{$user->name}}</dd>
                <dt class="col-sm-4">Email :</dt>
                <dd class="col-sm-8">{{$user->email}}</dd>
                <dt class="col-sm-4">Phone :</dt>
                <dd class="col-sm-8">{{$user->phone}}</dd>
                <dt class="col-sm-4">Gender :</dt>
                <dd class="col-sm-8">{{$user->gender}}</dd>
                <dt class="col-sm-4">Date Of Birth :</dt>
                <dd class="col-sm-8">{{ Carbon\Carbon::parse($user->date_of_birth)->format('Y-m-d') }}</dd>
                <dt class="col-sm-4">National Id :</dt>
                <dd class="col-sm-8">{{$user->national_id}}</dd>
                <dt class="col-sm-4">Created at :</dt>
                <dd class="col-sm-8">{{$user->created_at->toDateString()}}</dd>
                </dl>
            </div>  <!-- /.card-body -->
        </div>  <!-- /.card -->
    </div> <!-- ./col -->
</div>
@endsection