<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileCongVan extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'id_congvan', 'name',
    ];
    protected $primaryKey = 'id';
    protected $table = 'filecongvan';
}
