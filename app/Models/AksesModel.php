<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AksesModel extends Model
{
    use HasFactory;

    protected $table = 'akses_models';

    protected $primaryKey = 'id_akses';

    public $incrementing = false;

    protected $guarded = [];

    public function aksesRole()
    {
        return $this->belongsTo(RoleModel::class, 'id_role', 'id_role');
    }

    public function aksesMenu()
    {
        return $this->belongsTo(MenuModel::class, 'id_menu', 'id_menu');
    }

    public function aksesSubMenu()
    {
        return $this->belongsTo(SubMenuModel::class, 'id_submenu', 'id_submenu');
    }
}
