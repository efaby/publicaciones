<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class LineasInvestigacionModel extends Model
{
	protected $table = "lineas_investigacion";
	protected $primaryKey = "id";
	public $timestamps = false;
	public $incrementing = false;	

	protected $fillable = ['id','nombre','descripcion'];
	
}
