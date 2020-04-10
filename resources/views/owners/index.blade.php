@extends('layouts.admin')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Owners</h3>
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
                  <th>Owner_id</th>
                  <th>Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($owners as $owner)
                <tr>
                  <td>{{$owner->id}}</td>
                  <td>{{$owner->name}}</td>
                  <td>{{$owner->national_id}}</td>
                  <td>{{$owner->email}}</td>
                  <td>{{$owner->phone}}</td>
                  <td>{{$owner->gender}}</td>
                  <td>{{Carbon\Carbon::parse($owner->date_of_birth)->format('Y-m-d')}}</td>
                  <td> <img class="img-circle elevation-2 ml-3" src="{{ asset('storage/'. $owner->avatar)}}" style="width:80px; height:80px" alt="User Avatar"></td>
                  <td>{{$owner->created_at->toDateString()}}</td>
                  <td class="project-actions text-center "> 
                      <div class="btn-group btn-group-sm">
                      <a class="btn btn-primary btn-sm" href="{{route('owners.show',['owner'=>$owner->id])}}">
                          <i class="fas fa-folder"> </i>View 
                      </a>
                      <a class="btn btn-info btn-sm" href="{{route('owners.edit',['owner'=>$owner->id])}}">
                          <i class="fas fa-pencil-alt"> </i>Edit
                      </a>
                      <form method="POST" action="{{route('owners.destroy',['owner'=>$owner->id])}}">
                          @csrf 
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this user?');">
                            <i class="fas fa-trash"></i>Delete</button>
                      </form>
                        <!-- <a href="users.show" class="btn btn-info"><i class="fas fa-eye"></i></a> -->
                        <!-- <a href="#" class="btn btn-danger"><i class="fas fa-trash"></i></a> -->  
                      </div>
                  </td>
                </tr>
                @endforeach
                </tbody>
               <!--  <tfoot>
                <tr>
                  <th>User_id</th>
                  <th>Name</th>
                  <th>National_id</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>gender</th>
                  <th>Date_of_Birth</th>
                  <th>Profile Image</th>
                  <th>Created_at</th>
                  <th>Action</th>
                </tr>
                </tfoot> -->
              </table>
              {{ $owners->links() }}
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>    

 @endsection
