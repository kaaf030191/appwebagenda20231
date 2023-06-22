@extends('template.layout')
@section('titleGeneral', 'Registrar ciudad...')
@section('sectionGeneral')
<form id="frmCityInsert" action="{{url('city/insert')}}" method="post">
	<div class="row">
		<div class="col-md-12 form-group">
			<label for="">Nombre</label>
			<input type="text" name="txtName" class="form-control">
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 text-right">
			<button type="submit" class="btn btn-primary">Registrar datos</button>
		</div>
	</div>
</form>
@endsection