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

                    {{ __('Insert total hours of each subject') }}

                    <form method="POST" action="{{ route('insert_timetable') }}">
                    @csrf
                    <table>
                    <tr>
                    <th>Subject</th>
                    <th>Hours</th>
                    </tr>
                    @for ($i = 0; $i < $total_sub; $i++)
                       
                    <tr>
                        <td><input type="text" name='sub_name[]' /></td>
                        <td><input type="number"  name='sub_hour[]'  /></td>
                     </tr>
                 
                    @endfor
                    </table>
                    <lable >Total hours:</lable>
                    <span>{{$totle_h_p}}</span><br>
                    <lable >Total hours intered:</lable>
                    <span id='totle_h_p'>0</span>
                    <input type="hidden" id='totle_h_p_s' name = 'totle_h_p_s' />
                    <input type="hidden" id='work_day' name = 'work_day' value={{$work_day}} />
                    <input type="hidden" id='hwi_id' name = 'hwi_id' value={{$hwi_id}} />
                    <br>
                  
                    <input type="submit" value="Generate" id='btnSubmit' disabled>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

//alert('sdf');

$(document).ready(function(){

 
    $("input[name='sub_hour[]']").focusout(function(){

        var totalHour = 0;
//    var sub_name = $("input[name='sub_name[]']").map(function(){return $(this).val();}).get();
    var sub_hour = $("input[name='sub_hour[]']").map(function(){return $(this).val();}).get();
    sub_hour.forEach(function(i) {
     
        if(i != '')
        {
            totalHour +=  parseFloat(i);
         }
    });

    $("#totle_h_p").text(totalHour);
    $("#totle_h_p_s").val(totalHour);
    
    if(<?=$totle_h_p?> === totalHour)
    {
        $("#btnSubmit").attr("disabled", false);
    }else{
        $("#btnSubmit").attr("disabled", true);

    }


});
});

</script>

@endsection






