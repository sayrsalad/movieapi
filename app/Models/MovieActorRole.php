<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class MovieActorRole extends Model
{
    use HasFactory;

    protected $table = "movie_actor_role";

    protected $fillable = ['movie_ID','actor_ID','role_ID', 'character_name'];



    use softDeletes;
}
