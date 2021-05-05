@extends('layouts.admin')

@section('content')
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Medicines Tables</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                </div>
            </div>
             
            <div class="card-body table-responsive">
              <table id="medicineTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Medicine Name</th>
                  <th>Medicine Price</th>
                  <th>Medicine Type</th>
                  <th>Medicine Quantity</th>
                  <th>Actions</th>
                </tr>
                </tbody>
                @foreach ($medicines as $medicine)  

                <tfoot>
                <tr>
                  <td>{{$medicine->id}}</td>
                  <td>{{$medicine->name}}</td>
                  <td>{{$medicine->price}} $</td>
                  <td>{{$medicine->type}}</td>
                  <td>{{$medicine->quantity}}</td>

                  <td> 

                  <div class="btn-group btn-group-sm">
                    <div class="row">
                      <a class="btn btn-outline-info mr-2 btn-sm" href="{{route('medicines.show',['medicine'=>$medicine->id])}}">
                      <i class="fas fa-folder"> </i> View</a>

                    <a class="btn btn-outline-warning mr-2 btn-sm" href="{{route('medicines.edit',['medicine'=>$medicine->id])}}">
                    <i class="fas fa-pencil-alt"> </i> Edit</a>
        
                    <form method="POST" action="{{route('medicines.destroy',['medicine'=>$medicine->id])}}">
                    @csrf
                  @method('DELETE')
                      <button class="btn btn-outline-danger btn-sm" type="submit" onclick="return confirm('You are going to delete this medicines?,ok?');">
                        <i class="fas fa-trash"></i> Delete</a></form>
                  </td>
                </tr>
                @endforeach

                </tfoot>
              </table>
            </div>  <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>  

 <script>
 $(document).ready( function () {
    $('#orderTable').DataTable( );
  });
</script> 
 @endsection
