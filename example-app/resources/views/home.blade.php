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
                                <th scope="row">Predlog:</th>
                                <td>{{$suggestion->description}}</td>
                            </tr>
                            <tr>
                                <th scope="row">Status predloga:</th>
                                <td>{{$suggestion->status}}</td>
                                    </td>
                            </tr>
                             <tr>
                                 <th scope="row"></th>
                                 <td >
                             <center>
                                 <button class="btn btn-success" action=''><a class="btn btn-success" href="{{route('home.accept',$suggestion->id)}}">Odobri</a></button>
                                      <button class="btn btn-primary"><a class="btn btn-primary"href="{{route('home.partly',$suggestion->id)}}">Delimicno moguce odobravanje</a></button>
                                      <button class="btn btn-danger"><a class="btn btn-danger" href="{{route('home.cancel',$suggestion->id)}}">Odbij</a></button>
                              </center>
                                 </td>
                             </tr>
                             <tr>
                               <th scope="row">Direktorov komentar:</th>        
                                                  
               <td>
              <div class="form-outline w-100">
                @if($suggestion->comented)
                <textarea class="form-control" id="textAreaExample" rows="4"
                  style="background: #fff;"></textarea>
                  <br></br>
                  <center>  <button class="btn btn-info">Dodaj komentar</button> </center>
                  @endif
              </div>
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
