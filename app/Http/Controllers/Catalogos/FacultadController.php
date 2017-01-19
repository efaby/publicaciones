<?php
namespace App\Http\Controllers\Catalogos;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Catalogos\FacultadModel;
use App\Models\Catalogos\EscuelaModel;

class FacultadController extends Controller
{
	public function index(){
		return view('catalogos/index_facultad'); 
	}

	public function getFacultades(){
		return FacultadModel::all();		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 *	@param Request $request
     * @return \Illuminate\Http\JsonResponse
	 */
	public function store(Request $request)	{
		$result = FacultadModel::create($request->all());
		return ($result) ? response()->json(['success' => true]) : response()->json(['success' => false]);		 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id){
		return FacultadModel::find($id);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id){

		$facultad = FacultadModel::find($id);
		$facultad->fill($request->all());
		$facultad->save();
		return response()->json(['success' => true]);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id){

		$escuela = EscuelaModel::where('facultad_id',$id)-> count();
		if($escuela > 0){
			return response()->json(['success' => false]);
		}else{
			$facultad = FacultadModel::find($id);
			$facultad->delete();
			return response()->json(['success' => true]);
		}
	}

}
