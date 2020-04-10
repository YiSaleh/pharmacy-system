@extends('layouts.admin')

@section('content')
<!-- Main content -->
<section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Doctor_id</th>
                  <th>Doctor Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Banned </th>
                  @role('admin')
                  <th>Pharmacy Name</th>
                  @endrole
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($doctors as $doctor)
                <tr>
                  <td>{{$doctor->id}}</td>
                  <td>{{$doctor->name}}</td>
                  <td>{{$doctor->national_id}}</td>
                  <td>{{$doctor->email}}</td>
                  <td>{{$doctor->phone}}</td>
                  <td>{{$doctor->gender}}</td>
                  <td>{{Carbon\Carbon::parse($doctor->date_of_birth)->format('Y-m-d')}}</td>
                  <td> <img class="img-circle elevation-2 ml-3" src="{{ asset('storage/'. $doctor->avatar)}}" style="width:80px; height:80px" alt="Doctor Avatar"></td>
                  <td>{{$doctor->created_at->toDateString()}}</td>
                  @if($doctor->is_banned === 1)
                  <td> <span class="badge badge-warning">Banned</span> </td>
                  @else
                  <td><span class="badge badge-success">Unbanned</span></td>
                  @endif
                  
                  @role('admin')
                  <td>{{$doctor->pharmacy->name}}</td>
                  @endrole

                  <td class="project-actions text-center "> 
                      <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-sm" href="{{route('doctors.show',['doctor'=>$doctor->id])}}">
                          <i class="fas fa-folder"> </i>View 
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('doctors.edit',['doctor'=>$doctor->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Edit
                      </a>
                      <form method="POST" action="{{route('doctors.destroy',['doctor'=>$doctor->id])}}">
                          @csrf 
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash"></i>Delete</button>
                      </form>

                      @if($doctor->isNotBanned())
                      <a class="btn btn-success btn-sm" href="{{route('doctors.banned',['doctor'=>$doctor->id])}}">
                           <i class="fas fa-ban"></i> Ban
                      </a>
                      @else
                      <a class="btn btn-warning btn-sm" href="{{route('doctors.banned',['doctor'=>$doctor->id])}}">
                           <i class="fas fa-ban"></i> Unban
                      </a>
                      @endif
                      
                      </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>Doctor_id</th>
                  <th>Doctor Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Banned</th>
                  @role('admin')
                  <th>Pharmacy Name</th>
                  @endrole
                  <th>Action</th>
                </tr>
                </tfoot>
              </table>
              {!! $doctors->links() !!}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>    
 @endsection
