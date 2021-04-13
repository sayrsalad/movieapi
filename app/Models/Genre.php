<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Genre extends Model
{
    use HasFactory;
    public $primaryKey = 'genre_ID';

    public function movies()
    {
    	return $this->hasMany(Movie::class);
    }

    protected $fillable = ['genre_name','genre_status'];
    use softDeletes;
}
