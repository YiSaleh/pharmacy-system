@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="row">
    <div class="col-12">
       <div class="card">
          <div class="card-header">
              <h3 class="card-title">UserAddresses Tables</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                      <i class="fas fa-minus"></i></button>
                </div>
          </div> <!-- /.card-header -->
          <div class="card-body table-responsive">
            <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>#Id</th>
                  <th>User</th>
                  <th>Area Name </th>
                  <th>street Name</th>
                  <th>building Number</th>
                  <th>floor Number</th>
                  <th>Flat Number</th>
                  <th>Mainstreet </th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>  
                @foreach ($userAddresses as $address)              
                <tr>
                  <td>{{$address->id}}</td>
                  <td>{{$address->User->name}}</td>
                  <td>{{$address->area->name}}</td>
                  <td>{{$address->street_name}}</td>
                  <td>{{$address->building_no}}</td>
                  <td>{{$address->floor_no}}</td>
                  <td>{{$address->flat_no}}</td>
                  @if($address->is_main === 1)
                  <td> <span class="badge badge-success">Main street</span> </td>
                  @else
                  <td><span class="badge badge-warning">Side street</span></td>
                  @endif
                  <td class="project-actions text-center"> 
                    <div class="btn-group btn-group-sm">
                      <div class="row">
                      <a class="btn btn-outline-info mr-2 btn-sm" href="{{route('userAddresses.show',['userAddress'=>$address->id])}}">
                          <i class="fas fa-folder"> </i> View 
                      </a>
                      <a class="btn btn-outline-warning mr-2 btn-sm" href="{{route('userAddresses.edit',['userAddress'=>$address->id])}}">
                          <i class="fas fa-pencil-alt"> </i> Edit
                      </a>
                      <form method="POST" action="{{route('userAddresses.destroy',['userAddress'=>$address->id])}}">
                        @csrf 
                        @method('DELETE')
                        <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this address?');">
                        <i class="fas fa-trash"></i> Delete</button>
                      </form>
                     </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>#Id</th>
                  <th>User</th>
                  <th>Area Name </th>
                  <th>street Name</th>
                  <th>building Number</th>
                  <th>floor Number</th>
                  <th>Flat Number</th>
                  <th>Main Street </th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              {!! $userAddresses->links() !!}
            </div>
            <!-- /.card-body -->
    </div>
  </div>
</div>

 @endsection
