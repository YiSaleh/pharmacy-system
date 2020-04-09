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
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th> ID</th>
                  <th>Name</th>
                  <th>Created At</th>
                 <!--  <th>Periority</th>
                  <th>Area</th> -->
                  <th>Actions </th>
                </tr>
                </thead>
                <tbody>
                  @foreach($pharmacies as $pharmacy)
                <tr>
                  <td>{{$pharmacy->id}}</td>
                  <td>{{$pharmacy->name}}</td>
                  <td>{{$pharmacy->created_at}}</td>
                 <!--  <td>{{$pharmacy->periority}}</td>
                  <td>{{$pharmacy->area ? $pharmacy->area->name : 'not exist'}}</td> -->
                  <td class="project-actions text-left"> 
                     <a class="btn btn-primary btn-sm mr-3" href="{{route('pharmacy.show',['pharmacy'=>$pharmacy->id])}}">
                          <i class="fas fa-folder"> </i>View</a>
                      <a class="btn btn-primary btn-sm mr-3" href="{{route('pharmacy.edit',['pharmacy'=>$pharmacy->id])}}">
                          <i class="fas fa-folder"> </i>Edit</a>
                          <form method="POST" action="{{route('pharmacy.destroy',['pharmacy'=>$pharmacy->id])}}">
                            @csrf 
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this pharmacy?');">
                            <i class="fas fa-trash"></i>Delete</button>
                          </form>
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
