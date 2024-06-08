<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    // Campos que se pueden asignar masivamente
    protected $fillable = ['user_id', 'post_id'];

    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con el modelo Post
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    // Eventos del modelo
    protected static function boot()
    {
        parent::boot();

        // Evento al crear un "like"
        static::creating(function ($like) {
            // Lógica adicional antes de crear un like (si es necesario)
        });

        // Evento al eliminar un "like"
        static::deleting(function ($like) {
            // Lógica adicional antes de eliminar un like (si es necesario)
        });
    }
}

