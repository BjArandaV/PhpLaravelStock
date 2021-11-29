@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar Sucursal</div>
                <div class="card-body">
               
                    <form action="{{ url('updateSucursal/'.$sucursales->id) }}" method="post" >
                        @csrf
                    @method('PUT')
                        <div class="mb-3">
                            <label for="" class="form-label">Sucursal</label>
                            <input type="text" name="nombre" class="form-control" value="{{ $sucursales->nombre }}">
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