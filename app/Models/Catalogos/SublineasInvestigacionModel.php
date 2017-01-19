<?php
namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class SublineasInvestigacionModel extends Model
{
	protected $table = "sublineas_investigacion";
	protected $primaryKey = "id"; 
	public $timestamps = false;
	public $incrementing = false;	
	
	protected $fillable = ['id','nombre','descripcion','lineas_investigacion_id'];
	
	public function facultad(){
		return $this->belongsTo('App\Models\Catalogos\LineasInvestigacionModel','lineas_investigacion_id');
	}
	
}

