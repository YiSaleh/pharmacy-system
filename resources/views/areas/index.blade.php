@extends('layouts.admin')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with minimal features & hover style</h3>
            </div>
            <div class="row mt-3"> <a class="btn btn-primary btn-sm ml-5" href="{{route('areas.create')}}">
                          <i class="fas fa-folder"> </i>Create New Area</a></div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th> ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                  <th>Actions </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($areas as $area)
                <tr>
                  <td>{{$area->id}}</td>
                  <td>{{$area->name}}</td>
                  <td>{{$area->created_at}}</td>
                  <td class="project-actions text-left"> 
                      <!-- <div class="btn-group btn-group-sm"> -->
                      <a class="btn btn-primary btn-sm mr-3" href="{{route('areas.show',['area'=>$area->id])}}">
                          <i class="fas fa-folder"> </i>View</a>

                         <a class="btn btn-primary btn-sm mr-3" href="{{route('areas.edit',['area'=>$area->id])}}">
                          <i class="fas fa-folder"> </i>Edit</a>

                        <a class="btn btn-primary btn-sm" href="{{route('areas.destroy',['area'=>$area->id])}}" 
                          onclick="return confirm('Are you sure you want to delete this area?');">
                          <i class="fas fa-folder"> </i>Delete</a></td>
                </tr>
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>    

 <script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
 @endsection
