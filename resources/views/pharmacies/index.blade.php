@extends('layouts.admin')

@section('content')
<!-- Main content -->
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">DataTable of Pharmacies</h3>
      </div>
      <div>
        <a class="btn btn-danger btn-sm ml-3" href="{{route('pharmacy.trash')}}">
        <i class="fas fa-trash"> </i>View Trash</a>
      </div>
      <div class="card-body table-responsive">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th> ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Area</th>
            <th>Actions </th>
          </tr>
          </thead>
          <tbody>
            @foreach($pharmacies as $pharmacy)
          <tr>
            <td>{{$pharmacy->id}}</td>
            <td>{{$pharmacy->name}}</td>
            <td>{{$pharmacy->created_at}}</td>
            <!-- <td>{{$pharmacy->periority}}</td> -->
            <td>{{$pharmacy->area ? $pharmacy->area->name : 'not exist'}}</td>
            <td class="project-actions text-left"> 
              <div class="btn-group btn-group-sm">
                <a class="btn btn-outline-info mr-2 btn-sm " href="{{route('pharmacy.show',['pharmacy'=>$pharmacy->id])}}">
                    <i class="fas fa-folder"> </i>View</a>
                <a class="btn btn-outline-warning mr-2 btn-sm " href="{{route('pharmacy.edit',['pharmacy'=>$pharmacy->id])}}">
                <i class="fas fa-pencil-alt"> </i>Edit</a>
            @role('admin')
                <form method="POST" action="{{route('pharmacy.destroy',['pharmacy'=>$pharmacy->id])}}">
                  @csrf 
                  @method('DELETE')
                    <button class="btn btn-outline-danger  btn-sm" type="submit" onclick="return confirm('Are you sure you want to delete this area?');">
                      <i class="fas fa-trash"></i>Delete</button>
                </form>
            @endrole
          </tr>
          @endforeach
          </tbody>
        </table>
          {{ $pharmacies->links() }}
      </div>
    </div>
  </div>
</div>

 @endsection
