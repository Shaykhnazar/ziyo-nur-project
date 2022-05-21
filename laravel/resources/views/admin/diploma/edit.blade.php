@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.diploma.actions.edit', ['name' => $diploma->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <diploma-form
                :action="'{{ $diploma->resource_url }}'"
                :data="{{ $diploma->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.diploma.actions.edit', ['name' => $diploma->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.diploma.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </diploma-form>

        </div>
    
</div>

@endsection