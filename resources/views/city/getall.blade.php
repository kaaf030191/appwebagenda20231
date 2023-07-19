@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')
@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Fecha registro</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach($listTCity as $value)
			<tr>
				<td>{{$value->name}}</td>
				<td>{{$value->created_at}}</td>
				<td class="text-right">
					<button class="btn btn-xs btn-default" onclick="deleteCity('{{$value->idCity}}');">Eliminar</button>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection
@section('js')
<script src="{{asset('viewresources/city/getall.js')}}"></script>
@endsection