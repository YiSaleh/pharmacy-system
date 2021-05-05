@extends('layouts.admin')

@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title"> <i class="fas fa-trash"> </i> Deleted Pharmacies</h3>
      </div>
      <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
          <thead>
          <tr>
            <th> ID</th>
            <th>Name</th>
            <th>Created At</th>
            <th>Periority</th>
            <th>Area</th>
            <th>Deleted At</th>
            <th>Actions </th>
          </tr>
          </thead>
          <tbody>
            @foreach($pharmacies as $pharmacy)
          <tr>
            <td>{{$pharmacy->id}}</td>
            <td>{{$pharmacy->name}}</td>
            <td>{{$pharmacy->created_at}}</td>
            <td>{{$pharmacy->periority}}</td>
            <td>{{$pharmacy->area ? $pharmacy->area->name : 'not exist'}}</td>
            <td>{{$pharmacy->deleted_at}}</td>

            <td class="project-actions text-left"> 
              <div class="btn-group btn-group-sm">
                <a class="btn btn-primary btn-sm mr-3" href="{{route('pharmacy.restore',['pharmacy'=>$pharmacy->id])}}">
                    <i class="fas fa-folder"> </i> restore</a>
              </div>
            </td>
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
