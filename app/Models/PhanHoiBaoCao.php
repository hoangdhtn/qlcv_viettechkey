<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhanHoiBaoCao extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_baocao','tieude', 'id_nguoigui', 'noidung', 'trangthai',
    ];
    protected $primaryKey = 'id';
    protected $table = 'phanhoibaocao';


    // 1 - n : File phan hoi bao cao
    public function filephanhoibaocao()
    {
        return $this->hasMany('App\Models\FilePhanHoiBaoCao', 'id_phanhoibaocao');
    }
}
