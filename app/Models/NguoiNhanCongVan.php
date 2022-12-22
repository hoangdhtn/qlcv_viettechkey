<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiNhanCongVan extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_congvan', 'id_nguoinhan', 'trangthai',
    ];
    protected $primaryKey = 'id';
    protected $table = 'nguoinhancongvan';
}
