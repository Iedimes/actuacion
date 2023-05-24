<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.customer.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('ci'), 'has-success': fields.ci && fields.ci.valid }">
    <label for="ci" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.ci') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.ci" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('ci'), 'form-control-success': fields.ci && fields.ci.valid}" id="ci" name="ci" placeholder="{{ trans('admin.customer.columns.ci') }}">
        <div v-if="errors.has('ci')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('ci') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('domicilio'), 'has-success': fields.domicilio && fields.domicilio.valid }">
    <label for="domicilio" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.domicilio') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.domicilio" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('domicilio'), 'form-control-success': fields.domicilio && fields.domicilio.valid}" id="domicilio" name="domicilio" placeholder="{{ trans('admin.customer.columns.domicilio') }}">
        <div v-if="errors.has('domicilio')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('domicilio') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('monto'), 'has-success': fields.monto && fields.monto.valid }">
    <label for="monto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.monto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.monto" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('monto'), 'form-control-success': fields.monto && fields.monto.valid}" id="monto" name="monto" placeholder="{{ trans('admin.customer.columns.monto') }}">
        <div v-if="errors.has('monto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('monto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('gasto'), 'has-success': fields.gasto && fields.gasto.valid }">
    <label for="gasto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.gasto') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.gasto" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('gasto'), 'form-control-success': fields.gasto && fields.gasto.valid}" id="gasto" name="gasto" placeholder="{{ trans('admin.customer.columns.gasto') }}">
        <div v-if="errors.has('gasto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('gasto') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('vto'), 'has-success': fields.vto && fields.vto.valid }">
    <label for="vto" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.customer.columns.vto') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.vto" :config="datetimePickerConfig" v-validate="'date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('vto'), 'form-control-success': fields.vto && fields.vto.valid}" id="vto" name="vto" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_date_and_time') }}"></datetime>
        </div>
        <div v-if="errors.has('vto')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('vto') }}</div>
    </div>
</div>


