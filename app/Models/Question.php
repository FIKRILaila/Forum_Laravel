<?php

namespace App\Models;
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public function reponses(){
        return $this->hasMany(Reponse::class);
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
}

