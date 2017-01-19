<?php
namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class GrupoInvestigacionModel extends Model
{
	protected $table = "grupo_investigacion";
	protected $primaryKey = "id";
	public $timestamps = false;
	public $incrementing = false;	

	protected $fillable = ['id','nombre','descripcion'];
	
}