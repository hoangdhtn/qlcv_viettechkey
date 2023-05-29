<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogSetting extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'content',
    ];
    protected $primaryKey = 'id';
    protected $table = 'table_log_setting';
}
