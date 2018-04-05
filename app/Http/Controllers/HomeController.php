<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\News;
use Mail;
use App\Mail\NewsSign;
use Excel;
use App\User;
use PhpParser\Node\Expr\Array_;


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
            $nArr["sign_code"]=$user->signCode;
            Mail::to($user->email)->send(new NewsSign($nArr));
        }
    }

    public function export()
    {
     $users=User::all();
        $users2=User::find(3);
        return Excel::create("users",function($excel) use ($users,$users2){
           $excel->sheet("users", function($sheet) use ($users){
               $sheet->fromArray($users);
           });
            $excel->sheet("user1", function($sheet2) use ($users2){
                $sheet2->fromArray(array( $users2));
            });
        })->download();
    }
}
