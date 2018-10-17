<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'acl_menus';
    public $timestamps = false;
    protected $guarded = [];
}
