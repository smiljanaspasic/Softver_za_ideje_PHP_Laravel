@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $suggestion)
            <div class="card">
                <div class="card-header"><h4><center>{{$suggestion->title}}</center></h4></div>

                <div class="card-body">
                    <div class="col-md-12">
                   
                        @csrf
                        <table class="table">
                            <tr>
                                 
                                <td >
                                  
                                    <div class="col-md-12">    {{$suggestion->description}} </div>
                                    
                                    </td>
                                    
                            </tr>
                             
                            <tr>
                               
                                 <td>
                                    
                                     <div class='col-md-4'> Status predloga:   </div>      
                                     
                                    </td>
                                    <td>
                                        <div class="col-md-12">{{$suggestion->status}}</div>
                                    </td>
                            </tr>
                            
                        </table>
                        
               
                    </div>
                </div>
            </div>
            <br></br>
            @endforeach
        </div>
    </div>
</div>
@endsection
