<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Figuras extends Model
{
        protected $table = 'figuras';

        protected $fillable = ['Nombre','Tipo','Subtipo','Color','Perimetro'];
}
