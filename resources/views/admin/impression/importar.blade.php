@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.impression.actions.index'))

@section('body')
<div class="container-fluid">

    <div class="card">

    <form action="/insertar" method="POST" enctype="multipart/form-data">
        <div class="card-header">
            <i class="fa fa-file-excel-o"></i>IMPORTAR DESDE EXCEL
        </div>
        @csrf
        {{-- <input type="file" name="archivo_excel"> --}}
        {{-- <button type="submit">Importar</button> --}}
        <div class="card-footer">
            <div><input type="file" name="archivo_excel" class="form-control-file"></div>
            <br><br>
            <button type="submit" class="btn btn-primary" :disabled="submiting">
                <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                {{ trans('Importar') }}
            </button>
            @if (session('message'))
            <div class="alert alert-success text-center mt-3" id="flash-message">
                {{ session('message') }}
            </div>

            <script>
                setTimeout(function() {
                    $('#flash-message').fadeOut('fast');
                }, 10000); // tiempo en milisegundos
            </script>
        @endif
        </div>
    </form>
    </div>
</div>
@endsection
