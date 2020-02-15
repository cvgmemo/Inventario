<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    protected $table='materia';

    protected $primaryKey='id_materia';

    public $timestamps=false;

    protected $fillable=[
    	'area_materia',
    	'descripcion'
    ];

    protected $guarded = [
    ];


}
