<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            {{-- <li class="nav-item"><a class="nav-link" href="{{ url('admin/custumers') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.custumer.title') }}</a></li> --}}
           <li class="nav-item"><a class="nav-link" href="{{ url('/importar') }}"><i class="fa fa-file-excel-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Importar Excel</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/documents') }}"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ trans('admin.document.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/impressions/create') }}"><i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ trans('admin.impression.title') }}</a></li>

           <li class="nav-item"><a class="nav-link" href="{{ url('admin/customers') }}"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ trans('admin.customer.title') }}</a></li>

           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            {{-- <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li> --}}
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
