<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $table = 'acl_modules';
    public $timestamps = false;
    protected $guarded = [];
}
