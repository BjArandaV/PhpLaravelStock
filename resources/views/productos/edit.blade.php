@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Producto</div>
                <div class="card-body">

                    <form action="{{ url('updateProducto/'.$productos->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Producto</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $productos->nombre }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Precio</label>
                            <input type="text" name="precio" class="form-control" value="{{ $productos->precio }}">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" value="{{ $productos->descripcion }}">
                        </div>

                        <div class="col-auto">
                            <button type="submit" class="btn btn-success">Guardar</button>
                        </div>
                        <br>
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection