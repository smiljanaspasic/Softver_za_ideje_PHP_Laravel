<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suggestion extends Model
{   
    use HasFactory;
    
    protected $table='suggestions';
    protected $primaryKey='id';
    protected $returnType = 'objet';
            
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'status',
        'commented',
        'comment'
    ];
     
      public $timestamps = true;
    
}
