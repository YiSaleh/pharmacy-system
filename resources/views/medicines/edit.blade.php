@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('medicines.update',['medicine'=>$medicine->id])}}">
    @csrf
    @method('PUT')
      <div class="card-body">
          <div class="form-group">
              <label for="medicineName">Medicine Name</label>
              <input type="text" class="form-control" id="drugName" name="name" value="{{$medicine->name}}">
          </div>
<!-- ###################################################################################################################################### -->
          <div class="form-group">
            <label for="exampleInputPassword1">Price</label>
            <input type="text" class="form-control" id="drugprice" name="price" value="{{$medicine->price}}">
          </div>
<!-- ##################################################################################################################################### -->
        <div class="form-group">
            <label for="drugtype">Medicine Type</label>
            <select class="form-control" id="drugtype" name='type'>
                <option value="Liquid" {{$medicine->type == Liquid ? "selected":" "}}>Liquid</option>
                <option value="Tablet" {{$medicine->type == Tablet ? "selected":" "}}>Tablet</option>
                <option value="Capsules" {{$medicine->type == Capsules ? "selected":" "}}>Capsules</option>
                <option value="Suppository" {{$medicine->type == Suppository ? "selected":" "}}>Suppository</option>
                <option value="Drops" {{$medicine->type == Drops ? "selected":" "}}>Drops</option>
                <option value="Injections" {{$medicine->type == Injections ? "selected":" "}}>Injections</option>
                <option value="patches" {{$medicine->type == patches ? "selected":" "}}> patches</option>
                <option value="Topical medicines" {{$medicine->type == Topical medicines ? "selected":" "}}>Topical medicines</option>
            </select>
        </div>
<!-- ##################################################################################################################################### -->
          <div class="form-group">
            <label for="exampleInputPassword1">Quantity</label>
            <input type="number" class="form-control" id="drugqty" name="quantity" value="{{$medicine->quantity}}">
          </div>
<!-- ##################################################################################################################################### -->
      <div class="text-center mt-5">
        <button type="submit" class="btn btn-outline-primary">Submit</button>
      </div>
   </div>
</form>
@endsection