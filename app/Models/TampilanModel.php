<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TampilanModel extends Model
{
    use HasFactory;

    protected $table = 'tampilan_models';

    protected $primaryKey = 'id_tampilan';

    public $incrementing = false;

    protected $guarded = [];
}
