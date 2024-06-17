<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Link;

class LinkController extends Controller
{
    public function create(){
        return view('user.link.create');
    }
    public function store(Request $request){


        $request->validate([
            'name' => 'required',
            'link' => 'required',
            'link' => 'url:http,https',

        ]);
        $data = $request->all();
        $data['random'] =  Str::random(5);
        Link::create($data);
        return redirect()->route('user.link.index');

    }


    public function index( $orderby='desc'){
        $links = Link::orderBy('id','desc')->get();
        if($orderby != 'desc'){
            $links = Link::orderBy('id','inc')->get();
        }
        return view('user.link.index' , compact(['links'  ]));
    }


    public function search(Request $request){
        $links = Link::where([ ['link', 'like', '%'. $request->link .'%'], ])->orderBy('id','desc')->get();
        return view('user.link.index' , compact(['links'  ]));

    }


}
