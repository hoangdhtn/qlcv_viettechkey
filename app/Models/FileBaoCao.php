<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileBaoCao extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_baocao', 'name',
    ];
    protected $primaryKey = 'id';
    protected $table = 'filebaocao';
}
