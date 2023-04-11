@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach($data as $suggestion)
            <div class="card text-left" id='{{$suggestion->id}}'>
                <div class="card-header"><h4><center>{{$suggestion->title}}</center></h4></div>

                <div class="card-body" >
                    <div class="col-md-12">
                        <form action="{{route('edit',$suggestion->id)}}" method="post">
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

                                    <th scope="row">Korisnik koji je predlozio:</th>
                                    <td>{{App\Http\Controllers\HomeController::getUser($suggestion->id)}}</td>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row"></th>
                                    <td >


                                        <input type="radio" name="status" value="odobreno"  class="check" checked="checked"> Odobri
                                        <input type="radio" name="status" value="delimicno"> Delimicno moguce odobravanje
                                        <input type="radio" name="status" value="odbijeno"> Odbij



                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Direktorov komentar:</th>        

                                    <td>
                                        <div class="form-outline w-100">
                                            @if($suggestion->commented)
                                            {{$suggestion->comment}}
                                            @else
                                            <textarea class="form-control" id="textAreaExample" rows="4" name="comment"

                                                      style="background: #fff;" >{{$suggestion->comment}}</textarea>

                                            @endif
                                        </div>
                                    </td>

                                </tr>

                            </table>
                            <div class="form-outline w-100">
                                @if($suggestion->commented)
                                <center><button class="btn btn-info btn-lg btn-block" type="submit" name="action" value="edit">Izmeni</button> </center>
                                @else
                                <center> <button class="btn btn-info btn-lg btn-block" type="submit" name="action" value="save">Sacuvaj</button> </center>

                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <br></br>
            @endforeach
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        var scrollTo = '{{session("scroll")}}';
        console.log(scrollTo);
        if (scrollTo) {
            $("html,body").animate({scrollTop: $(scrollTo).offset().top}, 1000);
        }
    }
    );
</script>
@endsection
