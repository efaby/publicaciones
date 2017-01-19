<?php

namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class AreaConocimientoModel extends Model
{
	protected $table = "area_conocimiento";
	protected $primaryKey = "id";
	public $timestamps = false;
	public $incrementing = false;	

	protected $fillable = ['id','nombre','descripcion'];
	
}
