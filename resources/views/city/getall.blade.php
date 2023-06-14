<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<table>
		<thead>
			<tr>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			@foreach($listTCity as $value)
				<tr>
					<td style="border: 1px dashed black;">{{$value->name}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
</body>
</html>