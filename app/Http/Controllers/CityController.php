<?php
namespace App\Http\Controllers;

use App\Models\TCity;
 
class CityController extends Controller
{
	public function actionGetAll()
	{
		$listTCity = TCity::all();

		dd($listTCity);
	}
}