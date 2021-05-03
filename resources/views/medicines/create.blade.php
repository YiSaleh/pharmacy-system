@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('medicines.store')}}">
    @csrf
      <div class="card-body">
        <div class="form-group">
          <label for="drugName">Medicine Name</label>
          <input type="text" class="form-control" id="drugName" placeholder="drug name" name="name" value="{{old('name')}}">
        </div>
        <div class="form-group">
          <label for="drugprice">Price</label>
          <input type="text" class="form-control" id="drugprice" placeholder="Drug Price" name="price" value="{{old('price')}}">
        </div>
        <div class="form-group">
          <label for="drugtype">Type</label>
          <input type="text" class="form-control" id="drugtype" placeholder="Drug Type" name="type" value="{{old('type')}}">
        </div>
        <div class="form-group">
          <label for="drugqty">Quantity</label>
          <input type="number" class="form-control" id="drugqty" placeholder="Drug Quantity" name="quantity" value="{{old('quantity')}}">
        </div>

      <div class="card-footer">
        <button type="submit" class="btn btn-outline-success">Submit</button>
      </div>
    </div>
</form>

@endsection