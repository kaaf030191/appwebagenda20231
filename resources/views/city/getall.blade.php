@extends('template.layout')
@section('titleGeneral', 'Lista de ciudades...')
@section('sectionGeneral')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Nombre</th>
			<th>Fecha registro</th>
		</tr>
	</thead>
	<tbody>
		@foreach($listTCity as $value)
			<tr>
				<td style="border: 1px dashed black;">{{$value->name}}</td>
				<td style="border: 1px dashed black;">{{$value->created_at}}</td>
			</tr>
		@endforeach
	</tbody>
</table>
@endsection