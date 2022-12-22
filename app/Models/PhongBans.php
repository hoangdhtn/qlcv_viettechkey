<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;


class PhongBans extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    protected $fillable = [
        'id', 'name', 'description',
    ];
    protected $primaryKey = 'id';
    protected $table = 'phongbans';

    public function users()
    {
        return $this->belongsToMany(User::class, 'phongban_user', 'user_id', 'phongban_id');
    }
}
