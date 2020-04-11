@extends('layouts.admin')

@section('content')
<!-- Main content -->
 <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
            <h3 class="card-title">Medicines Tables</h3>
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
                  <td>ID</td>
                  <td>Medicine Name</td>
                  <td>Medicine Price</td>
                  <td>Medicine Type</td>
                  <td>Medicine Quantity</td>
                  <td>Actions</td>
                </tr>
                </tbody>
                @foreach ($medicines as $medicine)  

                <tfoot>
                <tr>
                  <th>{{$medicine->id}}</th>
                  <th>{{$medicine->name}}</th>
                  <th>{{$medicine->price}} $ </th>
                  <th>{{$medicine->type}}</th>
                  <th>{{$medicine->quantity}}</th>

                  <td> 

                  <div class="btn-group btn-group-sm">
                    <div class="row">
                      <a class="btn btn-primary btn-sm" href="{{route('medicines.show',['medicine'=>$medicine->id])}}">
                      <i class="fas fa-folder"> </i>View</a>

                    <a class="btn btn-info btn-sm" href="{{route('medicines.edit',['medicine'=>$medicine->id])}}">
                    <i class="fas fa-pencil-alt"> </i>Edit</a>
        
                    <form method="POST" action="{{route('medicines.destroy',['medicine'=>$medicine->id])}}">
                    @csrf
                  @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit"    onclick="return confirm('You are going to delete this medicines?,ok?');">
                        <i class="fas fa-trash"></i>Delete</a></form>
                  </td>
                </tr>
                @endforeach

                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
 </section>   

 @endsection
