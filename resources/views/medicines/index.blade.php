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
            <div class="container m-5">
             <a href="{{route('medicines.create')}}" class="btn btn-success m-1">Create</a>
              <table class="table">
            <!-- /.card-header -->
            <div class="card-body">
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
                  <th>{{$medicine->price}}</th>
                  <th>{{$medicine->type}}</th>
                  <th>{{$medicine->quantity}}</th>

                  <td> 

                    <div class="btn-group btn-group-sm">
                    <a class="btn btn-primary btn-sm" href="{{route('medicines.show',['medicine'=>$medicine->id])}}">
                    <i class="fas fa-folder"> </i>View</a>

                      <div class="btn-group btn-group-sm"> 
                <a class="btn btn-warning btn-sm" href="{{route('medicines.edit',['medicine'=>$medicine->id])}}">
                <i class="fas fa-pencil-alt"> </i>Edit</a>
        
                      <form method="POST" action="{{route('medicines.destroy',['medicine'=>$medicine->id])}}">
                    @csrf
                  @method('DELETE')
                      <button class="btn btn-danger btn-sm" type="submit"              
                        onclick="return confirm('You are going to delete this item?,ok?');">
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
