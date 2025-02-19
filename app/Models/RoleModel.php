<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleModel extends Model
{
    use HasFactory;

    protected $table = 'role_models';

    protected $primaryKey = 'id_role';

    public $incrementing = false;

    protected $guarded = [];
}
