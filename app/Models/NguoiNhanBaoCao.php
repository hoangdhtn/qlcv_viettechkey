<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiNhanBaoCao extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_baocao', 'id_nguoinhan', 'trangthai',
    ];
    protected $primaryKey = 'id';
    protected $table = 'nguoinhanbaocao';
}
