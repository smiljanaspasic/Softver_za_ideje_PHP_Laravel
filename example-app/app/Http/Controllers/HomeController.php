<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data=DB::table('suggestions')->get();
        return view('home',['data'=>$data]);
    }
    
    public function accept(Request $req) {
        $id=$req->id;
        DB::table('suggestions')->where('id',$id)->update(['status' => "prihvacen"]);

        $data=DB::table('suggestions')->get();
       return redirect()->route('home');
    }
    
     public function partly(Request $req) {
        $id=$req->id;
        DB::table('suggestions')->where('id',$id)->update(['status' => "delimicno prihvacen"]);

        $data=DB::table('suggestions')->get();
        return redirect()->route('home');
    }
    
    public function cancel(Request $req) {
        $id=$req->id;
        DB::table('suggestions')->where('id',$id)->update(['status' => "odbijen"]);

        $data=DB::table('suggestions')->get();
       return redirect()->route('home');
    }
    
    public function search(Request $request) {
        $search=$request->pretraga;
        $data=DB::table('suggestions')->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
        return view('home',['data'=>$data]);
    }
}
