<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modo extends Model
{
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug';
    }

    protected $fillable = ['name', 'slug', 'color'];

    // Relaciones muchos a muchos empleo-modo

    public function empleos()
    {
        return $this->belongsToMany(Empleo::class);
    }
    
}
