@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $suggestion)
            <div class="card text-left">
                <div class="card-header"><h4><center>{{$suggestion->title}}</center></h4></div>

                <div class="card-body">
                    <div class="col-md-12">
                   
                        @csrf
                        <table class="table">
                            <tr>
                                 
                                <td class="col-md-12">
                                  
                                        {{$suggestion->description}} </div
                                    
                                    </td>
                                    
                            </tr>
                             
                            <tr>
                               
                                 <td id='statustd'>
                                    
                                     Status predloga:      
                                     
                                 </td>
                                 <td id='statustd'>
                                       {{$suggestion->status}} 
                                 </td>
                            </tr>
                             
                             <tr>
                                 <td class='col-md-12'>
                             <center>
                                 <button class="btn btn-success" action=''><a class="btn btn-success" href="{{route('home.accept',$suggestion->id)}}">Odobri</a></button>
                                      <button class="btn btn-primary"><a class="btn btn-primary"href="{{route('home.partly',$suggestion->id)}}">Delimicno moguce odobravanje</a></button>
                                      <button class="btn btn-danger"><a class="btn btn-danger" href="{{route('home.cancel',$suggestion->id)}}">Odbij</a></button>
                              </center>
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
