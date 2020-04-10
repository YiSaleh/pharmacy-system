@extends('layouts.admin')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Orders Tables.</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>UserName</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Doctor Name</th>
                  <th>Is_insured</th>
                  <th>Created_at</th>
                  @role('admin')
                  <th>Pharmacy</th>
                  @endrole
                  @role('admin')
                  <th>Creator Type</th>
                  @endrole
                  <th>Action</th>

                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $order)  
                <tr>
                  
                  <td>{{$order->id}}</td>
                  if($order->user->hasRole('user'))
                  {
                  <td>{{$order->user->first->name->name ?? 'not exist'}}</td>
                  }
                  <td>{{$order->useraddress->street_name ?? 'not exist'}}</td>
                  <td>{{$order->status}}</td>
                  
                  <td></td>
                  <td>{{$order->prescription}}</td>
                  @if($order->is_insured === 1)
                  <td> <span class="badge badge-success">Insured </span> </td>
                  @else
                  <td><span class="badge badge-secondary">Not covered</span></td>
                  @endif
                  <td>{{$order->updated_at}}</td>
                  <td>{{$order->pharmacy->name}}</td>
                  @role('admin')
                  <td>{{$order->role}}</td>
                  @endrole
                 
                  <td> 
                  <div class="btn-group btn-group-sm"> 
                      <a class="btn btn-info btn-sm" href="{{route('orders.create',['order'=>$order->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Create</a>

                  <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-sm" href="{{route('orders.show',['order'=>$order->id])}}">
                          <i class="fas fa-folder"> </i>View</a>

                  <div class="btn-group btn-group-sm"> 
                      <a class="btn btn-info btn-sm" href="{{route('orders.edit',['order'=>$order->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Edit</a>
                          
                  <form method="POST" action="{{route('orders.delete',['order'=>$order->id])}}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger btn-sm" type="submit"  onclick="return confirm('You are going to delete this item?,ok?');">
                              <i class="fas fa-trash"> </i>Delete</a></form>
                  </td>
                </tr>
              
                @endforeach
                </tbody>
                <tfoot>
                <th>ID</th>
                  <th>UserName</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Doctor Name</th>
                  <th>Is_insured</th>
                  <th>Created_at</th>
                  @role('admin')
                  <th>Pharmacy</th>
                  @endrole
                  @role('admin')
                  <th>Creator Type</th>
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
