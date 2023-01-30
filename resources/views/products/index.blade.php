@extends('app')

@section('content')
<div class="container w-25 border p-5">

<center><h3>Registrar Productos</h3></center>
<form action="{{route('products')}}" method="POST">
    @csrf

    @if (session('success'))
        <h6 class="alert alert-success">{{session('success')}}</h6>
    @endif
    @error('titulo')
        <h6 class="alert alert-danger">{{$message}}</h6>      
    @enderror
    
    <div class="mb-3">
    <input type="text" class="form-control" name="producto" placeholder="Nombre Del Producto" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="modelo" placeholder="Modelo Del Producto" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="color" placeholder="Color Del Producto" aria-describedby="emailHelp" required>
  </div>
  <div class="mb-3">
    <input type="text" class="form-control" name="proveedor" placeholder="Proveedor" aria-describedby="emailHelp" required>
  </div>
  <center><button type="submit" class="btn btn-success">Registrar</button></center>
</form>
</div>

<div class="container w-30 border p-4">
<table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Modelo</th>
      <th scope="col">Color</th>
      <th scope="col">Proveedor</th>
      <th scope="col">Editar</th>
      <th scope="col">Eliminar</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($product_read as $product_env)
        <tr>
              <div class="row py-1">
                  <div class="col-md-9 d-flex align-items-center">
                  <td>{{$product_env->id}}</td>
                  <td>{{$product_env->producto}}</td>
                  <td>{{$product_env->modelo}}</td>
                  <td>{{$product_env->color}}</td>
                  <td>{{$product_env->proveedor}}</td>
                  <td><a href="{{route('products-update', ['id' => $product_env->id])}}"><button type="button" class="btn btn-warning btn-sm">Editar</button></a></td>
                  <td>  
                    <form action="{{route('products-destroy', [$product_env->id])}}" method="post">
                      @method('DELETE')
                      @csrf
                      <button class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                  </td>                  
                  </div>
              </div>
          </tr>
          @endforeach  
</tbody>
</table>    
</div>
@endsection