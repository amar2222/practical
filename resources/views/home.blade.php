@extends('layouts.app')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <form method="POST" action="{{ route('submit') }}">
                    @csrf
                    <table><tr><td>
                    <td> <label for="fname">No of Working days</label></td>
                    <td><input type="number" id="w_day" name="w_day" placeholder="Working days.."></td>
                    <td>
                    </tr><tr>
                    <td>
                    <td> <label for="lname">No of working hours per day</label></td>
                    <td><input type="number" id="w_h" name="w_h" placeholder="working hours per day.."></td>
                    </td>
                    
                    </tr>
                    <td>
                    <td><label for="country">Total Subjects</label></td>
                    <td><input type="number" id="t_s" name="t_s" placeholder="Total Subjects.."></td>
                    </td>
                    
                    </tr>
                    <td>
                    <td><label for="country">No of subjects per day</label></td>
                    <td><input type="number" id="s_p_d" name="s_p_d" placeholder="subjects per day.."></td>
                    </td>
                    </tr>
                        
                   </table>
                    
                    <lable >Total hours for week :</lable>
                    <span id='totle_h_p_w'>0</span>
                    <input type="hidden" id='totle_h_p' name = 'totle_h_p' />
                    <br>
                    <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

//alert('sdf');

$(document).ready(function(){

    $("#w_h").focusout(function(){
   
   var value = $(this).val();
   if (value < 0 || value > 8 ) {
    $(this).val('');
    alert('enter value between 1 to 8');
    }else{

        var value = $("#w_h").val() * $("#w_day").val();
        $("#totle_h_p_w").text(value);      
        $("#totle_h_p").val(value);      

    }
  });

  $("#w_day").focusout(function(){
   
   var value = $(this).val();
   if (value < 0 || value > 10 ) {
    $(this).val('');
    alert('enter value less than 10');
    }
  });

  $("#t_s").focusout(function(){
   
   var value = $(this).val();
   if (value < 0 ) {
    $(this).val('');
    alert('enter possitive number');
    }
  });
  
  $("#s_p_d").focusout(function(){
   
   var value = $(this).val();
   if (value < 0 ) {
    $(this).val('');
    alert('enter possitive number');
    }
  });


});

</script>

@endsection






