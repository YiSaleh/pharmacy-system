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
          <label for="drugtype">Medicine Type</label>
          <select class="form-control" id="drugtype" name='type'>
              <option value="Liquid">Liquid</option>
              <option value="Tablet">Tablet</option>
              <option value="Capsules">Capsules</option>
              <option value="Suppository">Suppository</option>
              <option value="Drops">Drops</option>
              <option value="Injections">Injections</option>
              <option value="patches"> patches</option>
              <option value="Topical medicines">Topical medicines</option>
          </select>
        </div>

        <div class="form-group">
          <label for="drugqty">Quantity</label>
          <input type="number" class="form-control" id="drugqty" placeholder="Drug Quantity" name="quantity" value="{{old('quantity')}}">
        </div>

      <div class="text-center mt-5">
        <button type="submit" class="btn btn-outline-success">Submit</button>
      </div>
    </div>
</form>

@endsection