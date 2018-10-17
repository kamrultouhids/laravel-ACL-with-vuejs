<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    protected $table = 'acl_role';
    protected $primaryKey = 'role_id';
    public $timestamps = false;

    protected $fillable = [
        'role_id', 'role_name'
    ];
}
