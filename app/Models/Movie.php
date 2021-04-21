<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Movie extends Model
{
    use HasFactory;
    public $primaryKey = 'movie_ID';

    public function genre()
    {
    	return $this->hasOne(Genre::class, 'genre_ID');
    }

    public function certificate()
    {
    	return $this->hasOne(Certificate::class, 'certificate_ID');
    }

    public function producers()
    {
        return $this->belongsToMany(Producer::class, 'movie_producer', 'movie_ID', 'producer_ID');
    }

    public function actor()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor_role', 'movie_ID', 'actor_ID');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'movie_actor_role');
    }

    protected $fillable = ['movie_title','movie_story','movie_release_date','movie_film_duration','movie_additional_info', 'genre_ID', 'certificate_ID', 'movie_poster', 'movie_status'];
    use softDeletes;
}
