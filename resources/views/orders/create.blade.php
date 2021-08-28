@extends('layouts.admin')

@section('content') 
<form role="form" method="POST" action="{{route('orders.store')}}">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="userName">User Name </label>
        <select class="form-control" id="userName" name="user_id">
        @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
        </select>
      </div>
    <div>  
      <div class="form-group">
        <label for="drugName">Drug</label>
        <input class="form-control"  id="medicine_id" type="hidden" name="order['medicine_id'][0]" required>
        <input type="text" id="drug[0]" class="form-control input-lg drugName" placeholder="Enter Drug Name">
        <div id="drugList"></div>
      </div>
      <div class="form-group">
        <label for="quantity">Quantity </label>
        <input type="number" class="form-control input-lg" id="quantity" placeholder="Drug Quantity" name="order['quantity'][0]">
      </div>
    <div>
    <div class="form-group">
      <label for="address">Address </label>
      <select class="form-control" id="address" name="user_address_id">
      @foreach($addresses as $address)  
        <option value="{{$address->id}}">{{$address->street_name}}</option>
      @endforeach
      </select>
    </div>

    <div class="text-center my-5">
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </div>         
</div>

<script>

$(document).ready(function(){

$(`.drugName`).keyup(function(){ 
       var query = $(this).val();
       if(query != '')
       {
          var _token = $('input[name="_token"]').val();
          $.ajax({
          url:"{{ route('orders.autocomplete') }}",
          method:"POST",
          data:{query:query, _token:_token},
          success:function(data){
              $('#drugList').fadeIn();  
              $('#drugList').html(data);
          }
          });
       }
   });

   $(document).on('click', 'li', function(){  
       $('.drugName').val($(this).text());  
       $('#medicine_id').val($(this).val());
       $('#drugList').fadeOut();  
   });  

});

</script>
@endsection