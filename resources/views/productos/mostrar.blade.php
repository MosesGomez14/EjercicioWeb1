@extends('app')

@section('content')
<div class="container w-30 border p-4">
  <form action="{{route('editar-producto',['id'=>$producto->id])}}" method="POST">
      @method('PATCH')
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
    <input type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
    </div>
    <div class="mb-3">
    <label class="form-label">Precio</label>
    <input type="number" step="0.01" class="form-control" name="precio" value="{{$producto->precio}}">
    </div>
  <button type="submit" class="btn btn-primary">Actualizar producto</button>
    </form>

</div>
@endsection
