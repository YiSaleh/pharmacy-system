@extends('layouts.admin')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Dashboard to know status for your orders.</h3>
            </div>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Orders</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            
            <div class="container m-5">
             <a href="{{route('orders.create')}}" class="btn btn-success m-1">Create</a>
              <table class="table">
            <!-- <div>
              <button class="btn btn-success m-3" href="{{route('orders.create')}}">Create Order</button>
            </div> -->

            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Prescription</th>
                  <th>Is_insured</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Pharmacy</th>
                  @role('admin')
                  <th>Creator</th>
                  @endrole
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)  
                <tr>
                  <td>{{$order->id}}</td>
                  <td>{{$order->user->first->name->name ?? 'not exist'}}</td>
                  <td>{{$order->useraddress->street_name ?? 'not exist'}}</td>
                  <td>{{$order->status}}</td>
                  <td>{{$order->prescription}}</td>
                  @if($order->is_insured === 1)
                  <td> <span class="badge badge-success">Insured </span> </td>
                  @else
                  <td><span class="badge badge-secondary">Not covered</span></td>
                  @endif
                  <td>{{$order->created_at}}</td>
                  <td>{{$order->updated_at}}</td>
                  <td>{{$order->pharmacy->name}}</td>
                  @role('admin')
                  <td>{{$order->role}}</td>
                  @endrole
                 
                  <td> 

                  <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-sm" href="{{route('orders.show',['order'=>$order->id])}}">
                          <i class=> </i>View</a>

                  <div class="btn-group btn-group-sm"> 
                      <a class="btn btn-warning btn-sm" href="{{route('orders.edit',['order'=>$order->id])}}">
                          <i class=> </i>Edit</a>
                          
              <form method="POST" action="{{route('orders.delete',['order'=>$order->id])}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-danger btn-sm" type="submit"              
       onclick="return confirm('You are going to delete this item?,ok?');">
                          <i class=""> </i>Delete</a></form>
                  </td>
                </tr>
              
                @endforeach
                </tbody>
                <tfoot>
                  <th>ID</th>
                  <th>username</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Prescription</th>
                  <th>Is_insured</th>
                  <th>Created_at</th>
                  <th>Updated_at</th>
                  <th>Pharmacy</th>
                  @role('admin')
                  <th>Creator</th>
                  @endrole
                 
                  <th>Action</th>
                    
                </tfoot> 
             
              </table>
              {{ $orders->links()}}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section> 
 
 
 @endsection
