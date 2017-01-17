<?php
namespace App\Models\Catalogos;

use Illuminate\Database\Eloquent\Model;

class FacultadModel extends Model
{
	protected $table = "facultad";
	protected $primaryKey = "id";
	public $timestamps = false;
	public $incrementing = false;	

	protected $fillable = ['id','nombre','descripcion'];
	
}
