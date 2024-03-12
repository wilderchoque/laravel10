

<label>Nombre:</label>
<br>
<input type="text" name="nombre" value="{{ isset($producto->nombre )?$producto->nombre:''}}">
<br>
<label>Precio:</label>
<br>
<input type="text" name="precio" value="{{ isset($producto->precio )?$producto->precio:''}}">
<br>
<label>Unidad:</label>
<br>
<input type="text" name="unidad" value="{{ isset($producto->unidad )?$producto->unidad:''}}">
<br>
<label>Imagen:</label>
<br>
@if (isset($producto->imagen))
    <img src="{{ asset('storage/'.$producto->imagen) }}" alt="" width="200" >
@endif

<br>
<input type="file" name="imagen">
<br><br>

<input type="submit" value="Enviar">

<a href="{{ route('producto.index') }}" class="btn btn-primary">Regresar</a>