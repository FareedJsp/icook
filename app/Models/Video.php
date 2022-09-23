<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    public function Category(){
        return $this->belongsTo(Category::class, 'id_category');
    }

    public function Resepi(){
        return $this->belongsTo(Resepi::class, 'id_resepi');
    }
}
