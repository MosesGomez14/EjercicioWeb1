@extends('app')

@section('content')
<div class="container w-30 border p-4">
    <div>
    <!-- Listado de productos activos -->
    <thead>
    <table class="table">
    <tr>
      <th scope="col">Nombre producto</th>
      <th scope="col">Precio</th>
      <th scope="col">IVA</th>
      <th scope="col">Precio con IVA</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
      @foreach ($productos as $producto)
  <tbody>
    <tr>
      <td><a>{{$producto->nombre}}</a></td>
      <td><a>{{$producto->precio}}</a></td>
      <td><a>{{$producto->iva}}</a></td>
      <td><a>{{$producto->preciomasiva}}</a></td>
      <td> <a class="btn btn-warning btn-sm" href="{{route('mostrar-producto',['id'=>$producto->id])}}">Editar producto</a></td>
      <td> <form action="{{route('eliminar-producto',[$producto->id])}}" method="POST">
              @method('DELETE')
              @csrf
              <button class="btn btn-danger btn-sm">Eliminar producto</button>
            </form></td>
    </tr>
  </tbody>
      @endforeach
      </table>
    </div>
    <!-- Form para crear nuevos productos -->
    <form action="{{route('productos')}}" method="POST">
      <legend>Agregar producto</legend>
      @csrf
      @if (session('Completo'))
      <h6 class="alert alert-success">{{session('Completo')}}</h6> 
      @endif
      @error('nombre')
      <h6 class="alert alert-danger">{{$message}}</h6> 
      @enderror
      @error('precio')
      <h6 class="alert alert-danger">{{$message}}</h6> 
      @enderror
      <div class="mb-3" >
       <label class="form-label">Nombre del producto</label>
        <input type="text" class="form-control" name="nombre">
        </div>
      <div class="mb-3">
      <label class="form-label">Precio</label>
      <input type="number" step="0.01" class="form-control" name="precio">
      </div>
      <button type="submit" class="btn btn-primary">Agregar producto</button>
    </form>
</div>
@endsection
