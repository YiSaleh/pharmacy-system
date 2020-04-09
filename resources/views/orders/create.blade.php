@extends('layouts.app')

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



<form role="form"  method="POST" action="{{route('order.store')}}">
    @csrf
   
    <!-- drop down list where doctors can select user -->
    <div class="col-6 m-5">
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
                    <input type="text" class="form-control" id="exampleInput" placeholder="Drug Price " name="drug_price">
                  </div>

     <!-- enter medicine price  -->

<div class="form-group col-6">
 <label for="InputBuildingNum">Quantity </label>
<input type="number" class="form-control" id="InputQuantity" placeholder="Drug Quantity " name="drug_qty">
</div>

<div class="form-group col-6">
 <label for="InputBuildingNum">Status </label>
<input type="number" class="form-control" id="InputQuantity" placeholder="Drug Quantity " name="drug_qty">
</div>

     <!-- enter order status   -->

     <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>Select Order Status</label>
                        <select class="form-control">
                          <option>New Order</option>
                        </select>
                      </div>
                    </div>


     <!-- Create button -->

                 
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Create</button>
                </div>
              </form>
            </div>
</form>




<script>
  $(document).ready(function(){

$('#name').keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
        var _token = $('input[name="_token"]').val();
        $.ajax({
         url:"{{ route('order.autocomplete') }}",
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
</script>
@endsection