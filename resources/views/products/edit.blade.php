@extends('app')

@section('content')
<div class="container w-25 border p-5">

<center><h3>Editar Producto</h3></center>
<form action="{{route('products-update', ['id' => $product_read->id])}}" method="POST">
    @csrf
    @method('PATCH')
    
    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif
    @error('titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>      
    @enderror
    
    <div class="mb-3">
    <input type="text" class="form-control" name="producto" placeholder="Nombre Del Producto" aria-describedby="emailHelp" value="{{$product_read->producto}}">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="modelo" placeholder="Modelo Del Producto" aria-describedby="emailHelp" value="{{$product_read->modelo}}">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="color" placeholder="Color Del Producto" aria-describedby="emailHelp" value="{{$product_read->color}}">
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" aria-describedby="emailHelp" value="{{$product_read->proveedor}}">
  </div>
  <center><button type="submit" class="btn btn-success">Actualizar</button></center>
</form>
</div>
@endsection