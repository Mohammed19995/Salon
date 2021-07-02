<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4" v-for="locale in locales">
                        <label>{{__('admin.name_' + locale)}}</label>
                        <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)"
                               class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.country')}}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker select_country" v-model="obj_data.country_id"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_country')">
                                <option v-for="country in countries" :value="country.id">
                                    {{country.name}}
                                </option>
                            </select>
                        </div>
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <button type="button" style="width: 100%" :disabled="loading" @click="makeAction"
                                class="btn btn-primary mt-4"
                                :class="loading ? 'spinner spinner-white spinner-left' : ''">
                            {{__('admin.save')}}
                        </button>

                    </div>
                    <div class="col-sm-2">

                        <button type="button" style="width: 100%"
                                class="btn btn-default mt-4 cancel-button">
                            {{__('admin.cancel')}}
                        </button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</template>


<script>
    let empty_obj = {
        name: getMultiLangField(),
        country_id: '',
    };
    export default {
        props: ['data', 'add', 'shock_event', 'countries'],
        data: function () {
            return {
                multi_language_fields: ['name'],
            }
        },
        filters: {},
        created: function () {
            this.setObjData();
        },
        methods: {
            setObjData: function () {
                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
                $('.select_country').val(this.obj_data.country_id).trigger('change');
            },

            makeAction: function () {
                if (this.add) {
                    this.addCity();
                } else {
                    this.updateCity();
                }
            },
            addCity: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                this_.show_loading();
                

                axios.post(api_urls.admin.state.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                        handle_response(this_, err.response.data, true, false);
                        this_.hide_loading();
                });


            },

            updateCity: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.state.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                        handle_response(this_, err.response.data, true, false);
                        this_.hide_loading();
                });
            },
        },
        watch: {
            shock_event: function () {
                this.setObjData();
                this.msg = {success: '', error: ''};
            }
        }

    }
</script>