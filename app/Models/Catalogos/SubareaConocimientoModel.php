<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class SubareaConocimientoModel extends Model
{
	protected $table = "subarea_conocimiento";
	protected $primaryKey = "id"; 
	public $timestamps = false;
	public $incrementing = false;	
	
	protected $fillable = ['id','nombre','descripcion','area_conocimiento_id'];
	
	public function areaConocimiento(){
		return $this->belongsTo('App\Models\Catalogos\AreaConocimientoModel','area_conocimiento_id');
	}
	
}
