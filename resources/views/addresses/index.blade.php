@extends('layouts.app')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
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
                @foreach ($useraddresses as $address)              
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
                      <a class="btn btn-primary btn-sm" href="{{route('useraddresses.show',['useraddress'=>$address->id])}}">
                          <i class="fas fa-folder"> </i>View 
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('useraddresses.edit',['useraddress'=>$address->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Edit
                      </a>
                          <form method="POST" action="{{route('useraddresses.destroy',['useraddress'=>$address->id])}}">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this address?');">
                            <i class="fas fa-trash"></i>Delete</button>
                          </form>
                        <!-- <a href="users.show" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                        <!-- <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->
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
                  <th>Mainstreet </th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
              {!! $useraddresses->links() !!}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>    
 
 @endsection
