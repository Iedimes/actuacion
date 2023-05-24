@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.impression.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">

        <impression-form
            :action="'{{ url('admin/impressions') }}'"
            v-cloak
            inline-template>

            {{-- <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate> --}}
                <form class="form-horizontal form-create" action="imprimir">

                <div class="card-header">
                    <i class="fa fa-print"></i> IMPRIMIR DOCUMENTOS
                </div>

                <div class="card-body">
                    @include('admin.impression.components.form-elements')
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

                <div class="card-footer">
                    <button type="submit" class="btn btn-danger" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-file-pdf-o'"></i>
                        GENERAR INFORME
                    </button>
                </div>

            </form>
        </impression-form>
        </div>
        </div>



@endsection
