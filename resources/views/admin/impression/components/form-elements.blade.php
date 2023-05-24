<div class="form-group row align-items-center" :class="{'has-danger': errors.has('doc_id'), 'has-success': fields.doc_id && fields.doc_id.valid }">
    <label for="doc_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.impression.columns.doc_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.doc_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('doc_id'), 'form-control-success': fields.doc_id && fields.doc_id.valid}" id="doc_id" name="doc_id" placeholder="{{ trans('admin.impression.columns.doc_id') }}"> --}}
        <select name="doc_id" id="doc_id" v-model="form.doc_id" class="form-control" class="@error('doc_id') is-invalid @enderror">
            <option value="0">TODOS</option>
            @foreach($documentTypes as $documentTypes)
              <option value="{{ $documentTypes['id']}}"> {{ $documentTypes->descripcion }}</option>
            @endforeach
           </select>
        <div v-if="errors.has('doc_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('doc_id') }}</div>
        @error('doc_id')
            <div class="input-group input-group--custom" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cli_id'), 'has-success': fields.cli_id && fields.cli_id.valid }">
    <label for="cli_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.impression.columns.cli_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.cli_id" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cli_id'), 'form-control-success': fields.cli_id && fields.cli_id.valid}" id="cli_id" name="cli_id" placeholder="{{ trans('admin.impression.columns.cli_id') }}"> --}}
        <select name="customers[]" id="customers" class="form-control" multiple class="@error('customers') is-invalid @enderror">
            @foreach($customers as $customer)
                <option value="{{ $customer->id }}">{{ $customer->nombre }}</option>
            @endforeach
        </select>
        <div v-if="errors.has('cli_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cli_id') }}</div>
        @error('customers')
            <div class="input-group input-group--custom" style="color: red">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>

