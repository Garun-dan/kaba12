<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMenuModel extends Model
{
    use HasFactory;

    protected $table = 'sub_menu_models';

    protected $primaryKey = 'id_submenu';

    public $incrementing = false;

    protected $guarded = [];

    public function joinMenu()
    {
        return $this->belongsTo(MenuModel::class, 'id_menu', 'id_menu');
    }
}
