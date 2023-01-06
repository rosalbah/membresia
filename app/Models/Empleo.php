<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleo extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Relaciones uno a muchos inversa
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relaciones muchos a muchos empleo-modo

    public function modos()
    {
        return $this->belongsToMany(Modo::class);
    }

    // Relaciones uno a uno polimórfica

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

}
