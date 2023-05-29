<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class BaoCao extends Model
{
    use HasFactory, Sortable;

    public $timestamps = true;

    public $sortable = ['id', 'id_nguoigui', 'tieude','thoihan', 'noidung', ];
    
    protected $fillable = [
        'id', 'id_nguoigui', 'tieude','thoihan', 'noidung', 
    ];
    protected $primaryKey = 'id';
    protected $table = 'baocao';


    // 1 - n : File bao cao
    public function filebaocao()
    {
        return $this->hasMany('App\Models\FileBaoCao', 'id_baocao');
    }


     // 1 - n : Nguoi nhan bao cao
    public function nguoinhanbaocao()
    {
        return $this->hasMany('App\Models\NguoiNhanBaoCao', 'id_baocao');
    }

    // 1 - n : Phan hoi bao cao
    public function phanhoibaocao()
    {
        return $this->hasMany('App\Models\PhanHoiBaoCao', 'id_baocao');
    }
}
