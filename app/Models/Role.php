<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Role extends Model
{
    use HasFactory;
    public $primaryKey = 'role_ID';

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor_role');
    }

    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor_role');
    }
    
    protected $fillable = ['role_name','role_status'];
    use softDeletes;
}
