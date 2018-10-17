<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuPermission extends Model
{
    protected $table = 'acl_menu_permission';
    public $timestamps = false;
    protected $guarded = [];
}
