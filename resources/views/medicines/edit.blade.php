@extends('layouts.admin')

@section('content')
<form role="form" method="POST" action="{{route('medicines.update',['medicine'=>$medicine->id])}}">
    @csrf
    @method('PUT')

      <div class="card-body">
           <div class="form-group">
                    <label for="exampleInputEmail1">Medicine Name</label>
                    <input type="text" class="form-control" id="drugName" placeholder="drug name" name="name" value="{{$medicine->name}}">
            </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Price</label>
                    <input type="text" class="form-control" id="drugprice" placeholder="Drug Price" name="price" value="{{$medicine->price}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Type</label>
                    <input type="text" class="form-control" id="drugtype" placeholder="Drug Type" name="type" value="{{$medicine->type}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Quantity</label>
                    <input type="number" class="form-control" id="drugqty" placeholder="Drug Quantity" name="quantity" value="{{$medicine->quantity}}">
                  </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
</form>

@endsection