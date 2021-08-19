<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes; //Implementamos
    protected $table = 'ventas';
    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $primarykey = 'id';
    public $timestamps = false;

    
    protected $fillable = [
        'nombre',
        'articulo',
        'cantidad',
        'impuesto',
        'descuento',
        'total_venta'
    ];

     // función para la búsqueda de productos
     public function scopeBuscarpor($query, $tipo, $buscar) {
    	if ( ($tipo) && ($buscar) ) {
    		return $query->where($tipo,'like',"%$buscar%");
    	}
    }
    // Relacion uno a muchos (inversa)
public function cliente(){
    return $this->belongTO('App\Models\Cliente');
 }
}
