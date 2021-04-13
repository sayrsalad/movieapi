<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Certificate extends Model
{
    use HasFactory;
    public $primaryKey = 'certificate_ID';

    public function movies()
    {
    	return $this->hasMany(Movie::class);
    }
    
    protected $fillable = ['certificate_name','certificate_status'];
    use softDeletes;
}
