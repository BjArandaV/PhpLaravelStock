@extends('layouts.app')

@section('content')

<div class="container">
    @if(isset($message))
    <div class="alert alert-danger">
        {{ $message }}
    </div>
    @endif
    @if(isset($message1))
    <div class="alert alert-primary">
        {{ $message1 }}
    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Listar Sucursales</div>
                <a href="{{ url('/agregarSu') }}" type="button" class="btn btn-success">Agregar sucursal</a>
                <div class="card-body">
                    <div class="row">
                        @foreach($sucursales as $sucursal)
                        <div class="col-3">
                            <div class="card mb-3" style="max-width:540px;">
                                <div class="row g-0">

                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $sucursal->nombre }}</h5>
                                        </div>
                                    </div>
                                    <div class="card-footer">

                                        <a href="{{ url('editarSucursal/'.$sucursal->id) }}" type="button" class="btn btn-warning">Editar</a>
                                        <a href="#eliminarModal{{$sucursal->id}}" role="button" class="btn btn-sm btn-danger" data-toggle="modal">Eliminar</a>

                                        <!-- Modal / Ventana / Overlay en HTML -->
                                        <div id="eliminarModal{{$sucursal->id}}" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">¿Estás seguro?</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>¿Seguro que quieres borrar la sucursal {{ $sucursal->nombre }}?</p>
                                                        <p class="text-warning"><small>Si lo borras, nunca podrás recuperarlo.</small></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                                        <a href="{{ url('eliminarSucursal/'.$sucursal->id) }}" type="button" class="btn btn-danger">Eliminar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center">
                        {{ $sucursales->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection