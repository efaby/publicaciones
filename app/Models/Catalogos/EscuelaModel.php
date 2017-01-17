<?php
namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class EscuelaModel extends Model
{
	protected $table = "escuela";
	protected $primaryKey = "id";
	public $timestamps = false;
	public $incrementing = false;	
	
	protected $fillable = ['id','nombre','descripcion','facultad_id'];
	
	public function facultad(){
		return $this->belongsTo('App\Models\Catalogos\FacultadModel','facultad_id');
	}
	
}
