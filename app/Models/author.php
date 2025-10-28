<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class author extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'birthdate'];

    public function book (){
        return $this->hasMany(book::class);
    }
}
