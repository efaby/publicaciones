<?php
namespace App\Http\Controllers\Catalogos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\GrupoInvestigacionModel;
use App\Models\Catalogos\PersonaModel;

class GrupoInvestigacionController extends Controller
{
	public function index(){
		return view('catalogos/index_grupo_investigacion'); 
	}

	public function getGrupoInvestigacion(){
		return GrupoInvestigacionModel::all();		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 *	@param Request $request
     * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)	{
		$result = GrupoInvestigacionModel::create($request->all());
		return ($result) ? response()->json(['success' => true]) : response()->json(['success' => false]);		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){
		return GrupoInvestigacionModel::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){

		$grupoinvestigacion = GrupoInvestigacionModel::find($id);
		$grupoinvestigacion->fill($request->all());
		$grupoinvestigacion->save();
		return response()->json(['success' => true]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		$persona = PersonaModel::where('grupo_investigacion_id',$id)-> count();
		if($persona > 0){
			return response()->json(['success' => false]);
		}else{
			$grupoinvestigacion = GrupoInvestigacionModel::find($id);
			$grupoinvestigacion->delete();
			return response()->json(['success' => true]);
		}
	}

}
