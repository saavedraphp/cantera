<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class ReservasCanchas extends Model
{
    use SoftDeletes;
       
    protected $table = "reservas_canchas";
    protected $primaryKey = 'id';
}
