<?php
namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class PersonaModel extends Model
{
	protected $table = "persona";
	protected $primaryKey = "id"; 
	public $timestamps = false;
	public $incrementing = false;	
	
	protected $fillable = ['id','cedula','nombres','apellidos','email','grupo_investigacion_id'];
	
	public function facultad(){
		return $this->belongsTo('App\Models\Catalogos\GrupoInvestigacionModel','grupo_investigacion_id');
	}
	
}
