<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Validator;

use App\Models\TCity;
 
class CityController extends Controller
{
	public function actionInsert(Request $request, SessionManager $sessionManager)
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
				$sessionManager->flash('listMessage', $listMessage);
				$sessionManager->flash('typeMessage', 'error');

				return redirect('city/insert');
			}

			$tCity = new TCity();

			$tCity->idCity = uniqid();
			$tCity->name = $request->input('txtName');

			$tCity->save();

			$sessionManager->flash('listMessage', ['Registro realizado correctamente.']);
			$sessionManager->flash('typeMessage', 'success');

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

	public function actionDelete($idCity, SessionManager $sessionManager)
	{
		$tCity = TCity::find($idCity);
		
		if($tCity != null)
		{
			$tCity->delete();
		}

		$sessionManager->flash('listMessage', ['Registro eliminado correctamente.']);
		$sessionManager->flash('typeMessage', 'success');

		return redirect('city/getall');
	}
}