<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CongVan extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_nguoigui', 'tieude', 'noidung', 
    ];
    protected $primaryKey = 'id';
    protected $table = 'congvan';


    // 1 - n : File cong van
    public function filecongvan()
    {
        return $this->hasMany('App\Models\FileCongVan', 'id_congvan');
    }


     // 1 - n : Nguoi nhan cong van
    public function nguoinhancongvan()
    {
        return $this->hasMany('App\Models\NguoiNhanCongVan', 'id_congvan');
    }

    // 1 - n : Phan hoi cong van
    public function phanhoicongvan()
    {
        return $this->hasMany('App\Models\PhanHoiCongVan', 'id_congvan');
    }


}
