<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoiCongVan extends Model
{
    use HasFactory;
    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_congvan', 'id_nguoigui', 'noidung', 'trangthai',
    ];
    protected $primaryKey = 'id';
    protected $table = 'phanhoicongvan';
}
