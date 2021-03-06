@extends('layouts.app')

@section('content')

<style>
    body {
        margin: 0;
        padding: 0;
        width: 100vw;
        height: 100vh;
        background-image: url("https://i.imgur.com/kNlIwVu.jpg");
    }
</style>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Agregar Sucursal</div>
                    <div class="card-body">
                        <form action="{{ url('/guardarSucursal')}}" method="post">
                            @csrf
                            <div class="mb-3">
                                <label for="" class="form-label">Sucursal</label>
                                <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
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
</body>