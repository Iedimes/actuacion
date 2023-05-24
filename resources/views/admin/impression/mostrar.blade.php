@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.impression.actions.index'))

@section('body')

<div class="container-fluid">

    <div class="card">

@if(isset($datos))
    <form action="guardar-datos"  method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <p class="h3">Migrar Datos</p>

        </div>
        @csrf
        <table class="table table-striped table-bordered table-sm">
            <thead class="bg-primary">
                <tr>
                    <th>Nombre</th>
                    <th>CI</th>
                    <th>Domicilio</th>
                    <th>Monto</th>
                    <th>Gasto</th>
                    <th>Vto</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datos[0] as $dato)
                    <tr>
                        @if(isset($dato[5]))
                        <td><input type="text" name="nombre[]" value="{{ $dato[0] }}" class="form-control" readonly></td>
                        <td><input type="text" name="ci[]" value="{{ $dato[1] }}" class="form-control" readonly></td>
                        <td><input type="text" name="domicilio[]" value="{{ $dato[2] }}" class="form-control" readonly></td>
                        <td><input type="text" name="monto[]" value="{{ $dato[3] }}" class="form-control" readonly></td>
                        <td><input type="text" name="gasto[]" value="{{ $dato[4] }}" class="form-control" readonly></td>
                        <td><input type="text" name="vto[]" value="{{ date('d/m/Y', strtotime('1900-01-01') + ($dato[5] - 2) * 86400) }}" class="form-control" readonly></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- <button type="submit">Guardar datos</button> --}}
        @if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

            <button type="submit" class="btn btn-primary" :disabled="submiting">
                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                {{ trans('Guardar datos') }}
            </button>
    </form>
@endif
    </div>
</div>
@endsection


