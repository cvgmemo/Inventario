<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class Dependencia extends Model
{
     protected $table='dependencias';

    protected $primaryKey='id_dependencia';

    public $timestamps=false;

    protected $fillable=[
      	'dependencia',
        'id_materia',
        'cantidad',
    ];

    protected $guarded = [
    
    ];


}
