<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{

    protected $fillable = [
        'name',
        'link',
        'random',
    ];


    // public function vzt()
    // {
    //     return visits($this);
    // }


    public function visits()
    {
        return visits($this)->relation();
    }

}
