@extends ('layouts.admin')
@section ('contenido')
<div class="row">
	<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
		<h3>Listado de Productos <a href="producto/create"><button class="btn btn-success">Nuevo</button></a><a href="{{url('reporteproductos')}}"target="black"><button class="btn btn-info">Reporte</button></a></h3>
		@include('almacen.producto.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-condensed table-hover">
				<thead>
					<th>Id</th>
					<th>Categoria</th>
					<th>Nombre</th>
					<th>Marca</th>
					<th>Precio</th>
					<th>Imagen</th>
					<th>Opciones</th>
				</thead>
               @foreach ($productos as $pro)
				<tr>
					<td>{{ $pro->idproducto}}</td>
					<td>{{ $pro->categoria}}</td>
					<td>{{ $pro->nombre}}</td>
					<td>{{ $pro->marca}}</td>
					<td>{{ $pro->precio}}</td>

					<td>
						<img src="{{asset('imagenes/productos/'.$pro->imagen)}}" alt="{{ $pro->nombre}}" height="100px" width="100px" class="img-thumbnail">
					</td>
					<td>
						<a href="{{URL::action('ProductoController@edit',$pro->idproducto)}}"><button class="btn btn-info">Editar</button></a>
						 <a href="" data-target="#modal-delete-{{$pro->idproducto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('almacen.producto.modal')
				@endforeach
			</table>
		</div>
		{{$productos->render()}}
	</div>
</div>

@endsection