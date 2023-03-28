@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h4><center>DODAJTE NOVI PREDLOG ZA POBOLJSANJE POSLOVANJA</center></h4></div>

                <div class="card-body">
                    <div class="col-md-12">
                    <form method='post' action="{{route('store_idea')}}">
                        @csrf
                        <table class="table">
                            <tr>
                               
                                <td>
                                    
                                        <input class="col-md-12" type="text" name="title"  placeholder="Unesite naslov vaseg predloga">
                                    
                                    </td>
                            </tr>
                             
                            <tr>
                                <td colspan="2">
                                   
                                    <textarea class="col-md-12" rows="10" name='description' placeholder="Sto detaljnije moguce opisite vas predlog"></textarea>
                                   
                                    </td>
                              
                            </tr>
                            
                        </table>
                        <center>
                            <button type="submit" class="btn btn-primary">Dodaj</button>
                        </center>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
