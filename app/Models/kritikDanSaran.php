<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kritikDanSaran extends Model
{
    use HasFactory;

    public $table = 'kritik_dan_saran';

    protected $guarded = [];
}
