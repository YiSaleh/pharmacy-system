@extends('layouts.admin')

@section('content')
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>

<form role="form" method="POST" action="{{route('orders.store',['order'=>$order->id])}}">
    @csrf
   
    <div class="col-6">
      <label align:center>User Name </label>
      <select class="form-control" name="user_id">
        <option value="{{$user->id}}">{{$user->name}}</option>
      </select>
    </div>
                
  <div class="card-body">
  <label for="exampleInput">Select a drug </label>
      <div class="form-group">
    <input type="text" name="medicine_id" id="name" class="form-control input-lg" placeholder="Enter Drug Name" />
    <div id="druglist">
    </div>
   </div>
   {{ csrf_field() }}
  </div>

  <div class="card-body col-6">  

<div class="form-group col-6">
 <label for="InputBuildingNum">Quantity </label>
<input type="number" class="form-control" id="InputQuantity" placeholder="Drug Quantity " name="quantity">
</div>


<div class="col-6">
<label align:center>Address </label>
<select class="form-control" name="user_address_id">

@foreach($addresses as $address)  
<option value="{{$address->id}}">{{$address->street_name}}</option>
@endforeach
</select>
</div>

<div class="card-footer">
<div>
<button type="submit" class="btn btn-primary">Create</button>
</div>
            
</div>


<script>
$(document).ready(function(){

$('#name').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('orders.autocomplete') }}",
         method:"POST",
         data:{query:query, _token:_token},
         success:function(data){
          console.log(data)
          $('#druglist').fadeIn();  
                   $('#druglist').html(data);
         }
        });
       }
   });

   $(document).on('click', 'li', function(){  
       $('#name').val($(this).text());  
       $('#druglist').fadeOut();  
   });  

});



</script>
@endsection