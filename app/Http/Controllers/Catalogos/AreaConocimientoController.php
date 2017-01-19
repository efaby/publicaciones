<?php

namespace App\Http\Controllers\Catalogos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\AreaConocimientoModel;
use App\Models\Catalogos\SubareaConocimientoModel;

class AreaConocimientoController extends Controller
{
	public function index(){
		return view('catalogos/index_area_conocimiento'); 
	}

	public function getAreaConocimiento(){
		return AreaConocimientoModel::all();		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 *	@param Request $request
     * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)	{
		$result = AreaConocimientoModel::create($request->all());
		return ($result) ? response()->json(['success' => true]) : response()->json(['success' => false]);		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){
		return AreaConocimientoModel::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){

                $areaconocimiento = AreaConocimientoModel::find($id);
		$areaconocimiento->fill($request->all());
		$areaconocimiento->save();
		return response()->json(['success' => true]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		$subareaconocimiento = SubareaConocimientoModel::where('area_conociemto_id',$id)-> count();
		if($subareaconocimiento > 0){
			return response()->json(['success' => false]);
		}else{
			$areaconocimiento = AreaConocimientoModel::find($id);
			$areaconocimiento->delete();
			return response()->json(['success' => true]);
		}
	}

}

