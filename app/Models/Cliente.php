<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function post(){
        return $this->belongsTo(Categoria::class);
    }
    
    protected $fillable = [
        'name',
        'category',
        'profile',
    ];
}
