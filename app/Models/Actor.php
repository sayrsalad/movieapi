<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Actor extends Model
{
    use HasFactory;
    public $primaryKey = 'actor_ID';

    public function movie()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor_role', 'actor_ID', 'movie_ID');
    }

    public function role()
    {
        return $this->belongsToMany(Role::class, 'movie_actor_role');
    }

    protected $fillable = ['actor_fname','actor_lname','actor_notes','actor_img','actor_status'];
    use softDeletes;
}
