<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuModel extends Model
{
    use HasFactory;

    protected $table = 'menu_models';

    protected $primaryKey = 'id_menu';

    public $incrementing = false;

    protected $guarded = [];
}
