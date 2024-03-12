@extends('layouts.app')
@section('content')
<div class="container">


@if (Session::has('mensaje'))
    {{ Session::get('mensaje') }}
@endif
<br>





<div class="card-header"> <a href="{{ route('producto.create') }}" class="btn btn-success">Subir Libro</a></div>
<div class="table-responsive-sm">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>

                <th scope="col">Unidad</th>
                <th scope="col">Imagen</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productos as $producto)
                <tr class="">
                    <td>{{ $producto->id }}</td>

                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->precio }}</td>
                    <td>{{ $producto->unidad }}</td>
                    <td> <img src="{{ asset('storage/' . $producto->imagen) }}" alt="" width="50">
                    </td>
                  <td> 
                   
                    <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-primary">Editar </a>
                    
                       
                        <form action="{{ route('producto.destroy', $producto->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <input type="submit" value="Borrar" class="btn btn-danger" />
                        </form>


                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

</div>
@endsection