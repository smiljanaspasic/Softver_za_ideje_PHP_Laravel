<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use App\Http\Requests\StoreSuggestionRequest;
use App\Http\Requests\UpdateSuggestionRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('new_idea');
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSuggestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSuggestionRequest $request)
    {
        $korisnik= Auth::user();
        $suggestion = new Suggestion();
        $suggestion->user_id=$korisnik->id;
        $suggestion->title=$request->title;
        $suggestion->description=$request->description;
        $suggestion->status="na cekanju";
        $suggestion->save();
        
        return redirect('/new_idea');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function show(Suggestion $suggestion)
    {
        $korisnik=Auth::user();
        $data=DB::table('suggestions')->where('user_id',$korisnik->id)->get();
        return view('my_ideas',['data'=>$data]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function edit(Suggestion $suggestion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSuggestionRequest  $request
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSuggestionRequest $request, Suggestion $suggestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Suggestion  $suggestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suggestion $suggestion)
    {
        //
    }
}
