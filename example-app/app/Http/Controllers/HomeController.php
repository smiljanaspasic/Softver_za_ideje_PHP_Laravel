<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Suggestion;

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
    
    public function index(Request $request)
    {
        $data=DB::table('suggestions')->get();
        $request->session()->put('status','home');
        return view('home',['data'=>$data]);
    }
    

    
     public function edit(Request $req) {
        $id=$req->id;
        
        switch ($req->input('action')) {
        case 'save':
           
            DB::table('suggestions')->where('id',$id)->update(['status' => $req->status]);
            $commented=DB::table('suggestions')->where('id',$id)->value('commented');
            if(!$commented) {
                DB::table('suggestions')->where('id',$id)->update(['commented' => true],);
                DB::table('suggestions')->where('id',$id)->update(['comment'=>$req->comment]);
            }
            break;

        case 'edit':
            DB::table('suggestions')->where('id',$id)->update(['status' => $req->status]);
            DB::table('suggestions')->where('id',$id)->update(['commented' => false],);
            
            break;
    }
    
       $data=DB::table('suggestions')->get();
       return redirect()->route('home')->with("scroll","#".$req->id);
    }
    
    public function search(Request $request) {
        $search=$request->pretraga;
        $data="";
        $base=DB::table('suggestions')->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
        $currentView= $request->session()->get('status');
        switch($currentView) {
            
            case "home":
                $data=$base;
                break;
            case "accept":
                $data=$base->where('status','odobreno');
                break;
            case "partly":
                $data=$base->where('status','delimicno');
                break;
            case "declined":
                $data=$base->where('status','odbijeno');
                 break;
            case "waiting":
                $data=$base->where('status','na cekanju');
             }
             
        return view('home',['data'=>$data]);
    }
    
    public function searchuser(Request $request) {
        $search=$request->pretraga;
        $data=DB::table('suggestions')->where('title', 'LIKE', '%'.$search.'%')->orWhere('description', 'LIKE', '%'.$search.'%')->get();
        return view('my_ideas',['data'=>$data]);
    }
    
    public function getUser($id) {
        $name=DB::table('users')->where('id',$id)->value('name');
        $surname=DB::table('users')->where('id',$id)->value('surname');
        $namesurname= $name." ".$surname;
        return $namesurname;
    }
    
     public function getSector($id) {
        $name=DB::table('users')->where('id',$id)->value('sektor');
        return $name;
    }
    
    public function accept(Request $request) {
        $data=DB::table('suggestions')->where('status','odobreno')->get();
        $request->session()->put('status','accept');
        return view('home',['data'=>$data]);
    }
    
    public function partly(Request $request) {
        $data=DB::table('suggestions')->where('status','delimicno')->get();
        $request->session()->put('status','partly');
        return view('home',['data'=>$data]);
    }
   
    public function decline(Request $request) {
        $data=DB::table('suggestions')->where('status','odbijeno')->get();
        $request->session()->put('status','declined');
        return view('home',['data'=>$data]);
    }
    
    public function wait(Request $request) {
        $data=DB::table('suggestions')->where('status','na cekanju')->get();
        $request->session()->put('status','waiting');
        return view('home',['data'=>$data]);
    }
}
