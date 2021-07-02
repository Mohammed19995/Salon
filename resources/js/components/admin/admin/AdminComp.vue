<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <gallery-comp @get-advance-emit-file="getAdvanceEmitFile" :default_image="file1_data.src"
                          :attr_name="file1_data.attr_name"
                          :selector_id_image="file1_data.selector_id_image"></gallery-comp>
            <success-error-msg :success="msg.success" :error="msg.error" :traffic_cop="traffic_cop" @update-anyway="updateAnyway"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>{{__('admin.name')}}</label>
                        <input type="text" v-model="obj_data.name" :placeholder="__('admin.name')" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.email')}}</label>
                        <input type="email" v-model="obj_data.email" :placeholder="__('admin.email')"
                               class="form-control">
                    </div>

                    <div class="col-lg-4">
                        <label>{{__('admin.password')}}</label>
                        <input type="password" v-model="obj_data.password" :placeholder="__('admin.password')"
                               class="form-control">
                    </div>


                </div>
                <div class="form-group row">

                    <div class="col-lg-4">
                        <label>{{__('admin.phone')}}</label>
                        <div class="input-group">
                            <input type="text" v-model="obj_data.phone" :placeholder="__('admin.phone')"
                                   class="form-control">
                            <div class="input-group-prepend">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker select_phone_code" v-model="obj_data.phone_code"
                                            data-size="7" data-live-search="true"
                                            tabindex="null">
                                        <option v-for="country in countries" :value="country.phone_code">
                                            {{country.phone_code}}
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.select_role')}}</label>
                        <div class="col-sm-12">
                            <select class="form-control select2" id="select_role">
                                <option value="-1" v-text="__('admin.without_role')"></option>
                                <option v-for="role in roles" :value="role.id">{{role.name[locale]}}</option>
                            </select>
                        </div>

                    </div>

                    <div class="col-lg-4">
                        <button type="button" style="margin-top: -25%" class="btn btn-primary mr-4"
                                @click="SelectImageFromGallery(file1_data.attr_name ,file1_data.selector_id_image )">
                            {{__('admin.select_image')}}
                        </button>
                        <show-image-comp @clear-emit-file="clearEmitFile" :attr_name="file1_data.attr_name"
                                         :selector_id_image="file1_data.selector_id_image"
                                         :shock_event="shock_event" :file1_data="file1_data">
                        </show-image-comp>
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
        name: '',
        email: '',
        phone_code: '',
        phone: '',
        password: '',
        image: ''
    };
    export default {
        props: ['file1_data', 'data', 'add', 'shock_event', 'countries', 'roles'],
        data: function () {
            return {
                attr_name: 'image',
                selector_id_image: 'image1',

                traffic_cop : false,
                can_update_anyway : 0,
            }
        },
        filters: {},
        created: function () {
            this.setObjData();
        },
        methods: {
            setObjData: function () {

                this.traffic_cop = false;
                this.can_update_anyway = 0;

                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
                this.obj_data.phone_code = this.obj_data.phone_code || this.countries[0].phone_code;
                $('.select_phone_code').val(this.obj_data.phone_code).trigger('change');

                if (this.add) {
                    $('#select_role').val(-1).trigger('change');
                } else {
                    let role_id = this.obj_data.role_id;
                    $('#select_role').val(role_id || -1).trigger('change');
                }
            },

            makeAction: function () {
                if (this.add) {
                    this.addUser();
                } else {
                    this.updateUser();
                }
            },
            addUser: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.obj_data[key]);
                });
                formData.append('role_id', $('#select_role').val() ? $('#select_role').val() : "");

                this_.show_loading();
                //  clear_message(this_);

                axios.post(api_urls.admin.admin.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateUser: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.obj_data[key]);
                });
                formData.append('role_id', $('#select_role').val() ? $('#select_role').val() : "");
                formData.append("can_update_anyway", this_.can_update_anyway);
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.admin.add + "/" + this_.obj_data.id, formData)
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