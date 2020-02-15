<?php

namespace inventario;

use Illuminate\Database\Eloquent\Model;

class articulo extends Model
{
    protected $table='inventario';

    protected $primaryKey='idarticulo';

    public $timestamps=false;

    protected $fillable=[
    	'idcategoria',
    	'modelo',
    	'marca',
    	'serial',
    	'bien_nac',
    	'imagen',
    	'status',
        'id_dependencia',
        'nombre_equipo',
        'id_etrabajo',
        'observacion',
    ];

    protected $guarded = [
    
    ];


}
