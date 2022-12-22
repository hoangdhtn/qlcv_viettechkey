<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FilePhanHoiBaoCao extends Model
{
    use HasFactory;
    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_phanhoibaocao', 'name',
    ];
    protected $primaryKey = 'id';
    protected $table = 'filephanhoibaocao';
}
