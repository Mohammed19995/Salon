<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-3" v-for="locale in locales">
                        <label>{{__('admin.title_' + locale)}}</label>
                        <input type="text" v-model="obj_data.title[locale]"
                               :placeholder="__('admin.title_'+locale)"
                               class="form-control">
                    </div>
                    <div class="col-lg-3" v-for="locale in locales">
                        <label>{{__('admin.message_' + locale)}}</label>
                        <textarea v-model="obj_data.message[locale]" class="form-control"
                                  :placeholder="__('admin.message_'+locale)"></textarea>
                    </div>

                </div>

                <div class="form-group">
                    <label>{{__('admin.notification_filter')}}</label>
                    <div class="radio-inline">
                        <label class="radio">
                            <input type="radio" name="radios2" value="1" v-model="filter">
                            <span></span>{{__('admin.filter')}}</label>
                        <label class="radio">
                            <input type="radio" name="radios2" value="2" v-model="filter">
                            <span></span>{{__('admin.select_users')}}</label>
                    </div>
                </div>
                <hr>
                <div v-show="filter == 1" class="row mb-3">
                    <div class="col-sm-4">
                        <label>{{__('admin.select_type') }}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker" id="select_type"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_type')">
                                <option value="-1">{{__('admin.all')}}</option>
                                <option v-for="type in types" :value="type.id" v-text="type.text"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>{{__('admin.select_status') }}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker" id="select_status"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_status')">
                                <option value="-1">{{__('admin.all')}}</option>
                                <option v-for="status in statuses" :value="status.id" v-text="status.text"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label>{{__('admin.select_phone_code_status') }}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker" id="select_phone_code_status"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_phone_code_status')">
                                <option value="-1">{{__('admin.all')}}</option>
                                <option v-for="phone_code_status in phone_code_statuses" :value="phone_code_status.id"
                                        v-text="phone_code_status.text"></option>
                            </select>
                        </div>
                    </div>

                </div>
                <place-comp v-show="filter == 1" :countries="countries" col="col-sm-6"
                            :show_city="true" :show_neighborhood="false"
                            country_selector="select_country" city_selector="select_city"
                            neighborhood_selector="select_neighborhood"
                            type="#" :listen_to_emit="false" :add_all_option="true">
                </place-comp>
                <div v-show="filter == 2" class="row mb-3">
                    <div class="col">
                        <label>{{__('admin.users') }}</label>
                        <select id="select_user" multiple name="user" class="form-control"></select>
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
        title: getMultiLangField(),
        message: getMultiLangField(),
    };
    export default {
        props: ['data', 'add', 'shock_event', 'types', 'statuses', 'phone_code_statuses', 'countries'],
        data: function () {
            return {
                filter : 1,
                multi_language_fields : ['title' , 'message'],
            }
        },
        filters: {},
        created: function () {
            this.setObjData();
        },
        methods: {
            setObjData: function () {
                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
                $('#select_type').val(-1).trigger('change');
                $('#select_status').val(-1).trigger('change');
                $('#select_phone_code_status').val(-1).trigger('change');
                $('#select_country').val(-1).trigger('change');
                $('#select_city').val(-1).trigger('change');
                $('#select_user').val(null).trigger('change');
            },

            makeAction: function () {
                this.addNotification();
            },
            addNotification: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                formData.append('filter' , this_.filter);
                formData.append('type' , $('#select_type').val());
                formData.append('status' , $('#select_status').val());
                formData.append('phone_status' , $('#select_phone_code_status').val());
                formData.append('country_id' , $('#select_country').val() || -1);
                formData.append('city_id' , $('#select_city').val() || -1);
                formData.append('users' ,JSON.stringify($('#select_user').val()) );

                this_.show_loading();

                axios.post(api_urls.admin.notification.add, formData)
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