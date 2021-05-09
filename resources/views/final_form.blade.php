@extends('layouts.app')
<style>
table, th, td {
  border: 1px solid black;
}
table {
  width: 100%;
}
</style>
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

                    {{ __('Time table') }}
                   <table >
                    <tr>
                  
                    <th>no:</th>
                    @for ($i = 1; $i <= $colom_data['work_day']; $i++)
                    
                    <th>{{$i}}</th>

                    @endfor
                    </tr>
                    @for ($i = 0; $i < sizeof($table_data); $i++)
                    
                       <tr>
                           <td>{{$table_data[$i]['subject']}}</td>
                           @for ($j = 1; $j <= $colom_data['work_day']; $j++)
                    
                           <td>{{round($table_data[$i]['hour']/$colom_data['work_day'],2)}}</td>

                           @endfor
                          
                          
                        </tr>
                    
                       @endfor
                    </table>
                  
                     
                </div>
            </div>
        </div>
    </div>
</div>

@endsection






