<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudiantes extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['nombre','edad', 'id_carrera'];

}
