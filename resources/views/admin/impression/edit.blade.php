@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.impression.actions.edit', ['name' => $impression->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <impression-form
                :action="'{{ $impression->resource_url }}'"
                :data="{{ $impression->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.impression.actions.edit', ['name' => $impression->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.impression.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </impression-form>

        </div>
    
</div>

@endsection