@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Orders Tables.</h3>
        <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
          </div>
      </div>

      <div class="card-body table-responsive">
        <table id="orderTable" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th>ID</th>
            <th>UserName</th>
            <th>Doctor Name</th>
            <th>Address</th>
            <th>Status</th>
            <th>Is_insured</th>
            <th>Created_at</th>
            @role('admin')
              <th>Pharmacy</th>
              <th>Creator Type</th>
            @endrole
            <th>Action</th>

          </tr>
          </thead>
          <tbody>
          @foreach ($orders as $order)  
          <tr>
            <td>{{$order->id}}</td>
            @if($order->user[0]->hasRole('user'))
            {
            <td>{{$order->user[0]->name ?? 'not exist'}}</td>
            } 
            @elseif($order->user[1]->hasRole('doctor|owner|admin'))
            {
              <td>{{$order->user[1]->name ?? 'not exist'}}</td>
            }
            @endif

            <td>{{$order->useraddress->street_name ?? 'not exist'}}</td>
            <td>{{$order->status}}</td>
            @if($order->is_insured === 1)
            <td> <span class="badge badge-success">Insured </span> </td>
            @else
            <td><span class="badge badge-secondary">Not covered</span></td>
            @endif
            <td>{{$order->created_at->toDateString()}}</td>
            @role('admin')
            <td>{{$order->pharmacy->name}}</td>
            @if($order->user[1]->hasRole('doctor'))
            <td> Doctor</td>
            @elseif($order->user[1]->hasRole('owner'))
            <td> Pharmacy Owner</td>
            @elseif($order->user[1]->hasRole('admin'))
            <td> Admin</td>
            @endif
            @endrole

          <td> 
              <div class="btn-group btn-group-sm">
                  <a class="btn btn-outline-info mr-2 btn-sm" href="{{route('orders.show',['order'=>$order->id])}}">
                      <i class="fas fa-folder"> </i> View</a>

              <div class="btn-group btn-group-sm"> 
                  <a class="btn btn-outline-warning mr-2 btn-sm" href="{{route('orders.edit',['order'=>$order->id])}}">
                      <i class="fas fa-pencil-alt"> </i> Edit</a>
                      
              <form method="POST" action="{{route('orders.destroy',['order'=>$order->id])}}">
              @csrf
              @method('DELETE')
              <button class="btn btn-outline-danger btn-sm" type="submit"  onclick="return confirm('You are going to delete this order?,ok?');">
                    <i class="fas fa-trash"> </i> Delete</a></form>
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
            <th>Creator Type</th>
          @endrole
            <th>Action</th>      
          </tfoot> 
        
        </table>
        {{ $orders->links() }}
      </div> <!-- /.card-body -->
    </div>
  </div>
</div> 
 
<script>
 $(document).ready( function () {
    $('#orderTable').DataTable( );
  });
</script>
@endsection