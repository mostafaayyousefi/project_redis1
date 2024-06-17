<?php

namespace App\Http\Controllers\Index;

use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class StaticController extends Controller
{

    public function site($random){

        $link = Link::where([ ['random',$random], ])->first();

        if($link){

            $post = Link::find(1);
$link->vzt()->increment();
// $link->vzt()->count();

            return Redirect::to($link->link);
        }


    }


    
}
