<div class="form-group row align-items-center" :class="{'has-danger': errors.has('number'), 'has-success': fields.number && fields.number.valid }">
    <label for="number" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diploma.columns.number') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.number" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('number'), 'form-control-success': fields.number && fields.number.valid}" id="number" name="number" placeholder="{{ trans('admin.diploma.columns.number') }}">
        <div v-if="errors.has('number')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('number') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('url'), 'has-success': fields.url && fields.url.valid }">
    <label for="url" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.diploma.columns.url') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.url" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('url'), 'form-control-success': fields.url && fields.url.valid}" id="url" name="url" placeholder="{{ trans('admin.diploma.columns.url') }}">
        <div v-if="errors.has('url')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('url') }}</div>
    </div>
</div>


