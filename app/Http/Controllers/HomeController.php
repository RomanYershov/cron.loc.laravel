<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\News;
use Mail;
use App\Mail\NewsSign;



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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        return view("createNews");
    }




    public function store(Request $request)
    {
        $n=new News($request->all());
        $n->save();
        $nArr=array("id"=> $n->id, "title"=>$n->title, "text"=>$n->text);
        $users=User::where("signature", 1)->get();
        foreach($users as $user)
        {
            Mail::to($user->email)->send(new NewsSign($nArr));
        }
    }
}
