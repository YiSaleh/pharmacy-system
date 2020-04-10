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



<form role="form"  method="POST" action="{{route('orders.store')}}">
    @csrf
   
    <!-- drop down list where doctors can select user -->
<div class="col-6">
<label align:center>User Name </label>
<select class="form-control" name="user_id">
@foreach($users as $user)  
<option value="{{$user->id}}">{{$user->name}}</option>
@endforeach
</select>
</div>
                 
   <!-- enter medicine name price and quantity  -->
   <body>
  <br />
  <div class="card-body">
  <label for="exampleInput">Select a drug </label>
      <div class="form-group">
    <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter Drug Name" />
    <div id="druglist">
    </div>
   </div>
   {{ csrf_field() }}
  </div>

     <!-- enter medicine quantity  -->


  <div class="card-body col-6">  
                  <div class="form-group">
                    <label for="exampleInput">Price</label>
                    <input type="text" class="form-control" id="exampleInput" placeholder="Drug Price " name="price">
                  </div>

                      <!-- enter medicine qty  -->

<div class="form-group col-6">
 <label for="InputBuildingNum">Quantity </label>
<input type="number" class="form-control" id="InputQuantity" placeholder="Drug Quantity " name="quantity">
</div>

<!-- are you covered by insurance? -->


<div class="form-group">
<label for="InputInsurance"> Do you have insurance?</label>
<div class="custom-control custom-radio">
<input class="custom-control-input" type="radio" id="insured" name="is_insured" value="1">
<label for="insured" class="custom-control-label">covered</label>
</div>        
</div>
<div class="custom-control custom-radio">
<input class="custom-control-input" type="radio" id="notinsured" name="is_insured" value="0">
<label for="notinsured" class="custom-control-label">Not covered</label>
</div>        
</div>
 
<br>
     <!-- enter order status   -->


<div class="col-sm-6">
 <div class="form-group">
<label>Select Order Status</label>
<select class="form-control" name="status">
<option>new</option>
</select>
</div>
</div>
<br>
     <!-- Prescribed for?   -->

<div class="card-body col-6">  
<div class="form-group">
<label for="exampleInput">Prescriped for</label>
<input type="text" class="form-control" id="exampleInput" placeholder="Prescribed for..? " name="prescription">
</div>


     <!-- User_Address_Id  -->
<div class="col-6">
<label align:center>Addres </label>
<select class="form-control" name="user_address_id">
@foreach($useraddresses as $address)  
<option value="{{$address->id}}">{{$address->street_name}}</option>
@endforeach
</select>
</div>

     <!-- Pharmacy_Id  -->

<div class="col-6">
<label align:center>Pharmacy</label>
<select class="form-control" name="pharmacy_id">
@foreach($pharmacies as $pharmacy)  
<option value="{{$pharmacy->id}}">{{$pharmacy->name}}</option>
@endforeach
</select>
</div>
     <!-- Create button -->


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

$(document).ready(function(){

var count = 1;

dynamic_field(count);

function dynamic_field(number)
{
 html = '<tr>';
       html += '<td><input type="text" name="name[]" class="form-control" /></td>';
       html += '<td><input type="text" name="price[]" class="form-control" /></td>';
       html += '<td><input type="text" name="quantity[]" class="form-control" /></td>';

       if(number > 1)
       {
           html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">Remove</button></td></tr>';
           $('tbody').append(html);
       }
       else
       {   
           html += '<td><button type="button" name="add" id="add" class="btn btn-success">Add</button></td></tr>';
           $('tbody').html(html);
       }
}

$(document).on('click', '#add', function(){
 count++;
 dynamic_field(count);
});

$(document).on('click', '.remove', function(){
 count--;
 $(this).closest("tr").remove();
});

$('#dynamic_form').on('submit', function(event){
       event.preventDefault();
       $.ajax({
           url:'{{ route("dynamic-field.insert") }}',
           method:'post',
           data:$(this).serialize(),
           dataType:'json',
           beforeSend:function(){
               $('#save').attr('disabled','disabled');
           },
           success:function(data)
           {
               if(data.error)
               {
                   var error_html = '';
                   for(var count = 0; count < data.error.length; count++)
                   {
                       error_html += '<p>'+data.error[count]+'</p>';
                   }
                   $('#result').html('<div class="alert alert-danger">'+error_html+'</div>');
               }
               else
               {
                   dynamic_field(1);
                   $('#result').html('<div class="alert alert-success">'+data.success+'</div>');
               }
               $('#save').attr('disabled', false);
           }
       })
});

});
</script>
@endsection