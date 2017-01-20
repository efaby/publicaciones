<?php

namespace App\Http\Controllers\Catalogos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\LineasInvestigacionModel;
use App\Models\Catalogos\SublineasInvestigacionModel;

class LineasInvestigacionController extends Controller
{
	public function index(){
		return view('catalogos/index_lineas_investigacion'); 
	}

	public function getLineasInvestigacion(){
		return LineasInvestigacionModel::all();		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 *	@param Request $request
     * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)	{

		$result = LineasInvestigacionModel::create($request->all());
		return ($result) ? response()->json(['success' => true]) : response()->json(['success' => false]);		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){
        return LineasInvestigacionModel::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){

                $lineainvestigacion = LineasInvestigacionModel::find($id);
		$lineainvestigacion->fill($request->all());
		$lineainvestigacion->save();
		return response()->json(['success' => true]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		$sublineasinvestigacion = SublineasInvestigacionModel::where('linea_investigacion_id',$id)-> count();
		if($sublineasinvestigacion > 0){
			return response()->json(['success' => false]);
		}else{
			$lineainvestigacion = LineasInvestigacionModel::find($id);
			$lineainvestigacion->delete();
			return response()->json(['success' => true]);
		}
	}

}

