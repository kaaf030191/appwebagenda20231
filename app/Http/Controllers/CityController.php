<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\TCity;
 
class CityController extends Controller
{
	public function actionInsert(Request $request)
	{
		if($request->isMethod('post'))
		{
			$listMessage = [];

			$validator = Validator::make(
			[
				'name' => trim($request->input('txtName'))
			],
			[
				'name' => 'required'
			],
			[
				'name.required' => 'El campo "nombre" es requerido.'
			]);
	
			if($validator->fails())
			{
				$errors = $validator->errors()->all();
	
				foreach($errors as $value)
				{
					$listMessage[] = $value;
				}
			}

			if(TCity::whereRaw("replace(name, ' ', '') = replace(?, ' ', '')", $request->input('txtName'))->first() != null) {
				$listMessage[] = 'La ciudad ya fue registrada con anterioridad.';
			}

			if(count($listMessage) > 0) {
				return redirect('city/insert');
			}

			$tCity = new TCity();

			$tCity->idCity = uniqid();
			$tCity->name = $request->input('txtName');

			$tCity->save();

			return redirect('city/insert');
		}

		return view('city/insert');
	}

	public function actionGetAll()
	{
		$listTCity = TCity::all();

		return view('city/getall',
		[
			'listTCity' => $listTCity
		]);
	}
}