<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <gallery-comp @get-advance-emit-file="getAdvanceEmitFile" :default_image="file1_data.src"
                          :attr_name="file1_data.attr_name"
                          :selector_id_image="file1_data.selector_id_image"></gallery-comp>
            <success-error-msg :success="msg.success" :error="msg.error" :traffic_cop="traffic_cop"
                               @update-anyway="updateAnyway"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">

                    <div class="col-lg-3">
                        <label>{{__('admin.name')}}</label>
                        <input type="text" v-model="obj_data.name" :placeholder="__('admin.name')" class="form-control">
                    </div>
                    <div class="col-lg-3">
                        <label>{{__('admin.email')}}</label>
                        <input type="email" v-model="obj_data.email" :placeholder="__('admin.email')"
                               class="form-control">
                    </div>

                    <div class="col-lg-3">
                        <label>{{__('admin.password')}}</label>
                        <input type="password" v-model="obj_data.password" :placeholder="__('admin.password')"
                               class="form-control">
                    </div>

                    <div class="col-lg-3">
                        <label>{{__('admin.phone')}}</label>
                        <div class="input-group">
                            <input type="text" v-model="obj_data.phone" :placeholder="__('admin.phone')"
                                   class="form-control">
                            <div class="input-group-prepend">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker select_phone_code"
                                            v-model="obj_data.phone_code"
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
                </div>
                <div class="form-group row">
                    <div class="col">
                        <place-comp :countries="countries" col="col-sm-6"
                                    :show_city="true" :show_neighborhood="false"
                                    country_selector="select_country" city_selector="select_city"
                                    neighborhood_selector="select_neighborhood"
                                    type="#" :listen_to_emit="true" :add_all_option="false">
                        </place-comp>
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-lg-8">
                        <label>{{__('admin.select_category')}}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker select_category" multiple v-model="obj_data.category_ids"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_category')">

                                <optgroup v-for="category in categories" :label="category.name[locale]">
                                    <option v-for="child in category.get_children" :value="child.id">
                                        {{child.name[locale]}}
                                    </option>
                                </optgroup>


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
                <div class="row">
                    <div class="col-sm-8">
                        <label>{{__('admin.working_hours')}}</label>
                        <table class="table">
                            <tr>
                                <th>التفعيل</th>
                                <th>اليوم</th>
                                <th>البداية</th>
                                <th>النهاية</th>
                            </tr>

                            <tr v-for="working_time in obj_data.working_times">
                                <td>
                                    <input type="checkbox" v-model="working_time.status">
                                </td>
                                <td :class="working_time.status ? '' : 'disable-elem'">
                                    {{days[working_time.day_id]}}
                                </td>
                                <td :class="working_time.status ? '' : 'disable-elem'">
                                    <custom-time-picker-comp  :data="working_time.start"
                                                              v-model="working_time.start"></custom-time-picker-comp>
                                </td>
                                <td :class="working_time.status ? '' : 'disable-elem'">
                                    <custom-time-picker-comp  :data="working_time.end"
                                                              v-model="working_time.end"></custom-time-picker-comp>
                                </td>
                            </tr>
                        </table>


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
    let workingTimes = [
        {day_id: 6, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 0, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 1, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 2, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 3, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 4, start: '8:00 AM', end: '9:00 PM', status: true},
        {day_id: 5, start: '8:00 AM', end: '9:00 PM', status: true},
    ];
    let empty_obj = {
        name: '',
        email: '',
        phone_code: '',
        phone: '',
        password: '',
        image: '',
        city_id: '',
        type: 2,
        category_ids : [],
        working_times: workingTimes,
    };

    export default {
        props: ['file1_data', 'data', 'add', 'shock_event', 'countries', 'types', 'categories'],
        data: function () {
            return {
                attr_name: 'image',
                selector_id_image: 'image1',

                traffic_cop: false,
                can_update_anyway: 0,

                days :days,
                obj_data : {},

            }
        },
        filters: {},
        created: function () {
            var this_ = this;
            this.$root.$on('set-place-data', function (value) {
                this_.obj_data.city_id = value.city_id;
            });
            this_.setObjData();
        },
        methods: {
            setObjData: function () {

                this.traffic_cop = false;
                this.can_update_anyway = 0;

                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
                this.obj_data.phone_code = this.obj_data.phone_code || this.countries[0].phone_code;

                $('.select_phone_code').val(this.obj_data.phone_code).trigger('change');
                $('#select_type').val(this.obj_data.type).trigger('change');

                let send_country_with_city = {country_id: null, city_id: null, neighborhood_id: null};

                if (!this.add) {
                    send_country_with_city = {
                        country_id: this.obj_data.city.country_id,
                        city_id: this.obj_data.city.id,
                        neighborhood_id: null
                    };
                    this.obj_data.category_ids = this.pluck(this.obj_data.categories , 'id');
                    $('.select_category').val(this.obj_data.category_ids).trigger('change');
                }else {
                    $('.select_category').val(null).trigger('change');
                }
                this.$root.$emit('send-place-data', send_country_with_city);
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
                formData.append('email', this_.obj_data.email ? this_.obj_data.email : "");
                formData.append('working_times', JSON.stringify(this_.obj_data.working_times));
                formData.append('category_ids', JSON.stringify(this_.obj_data.category_ids));

                this_.show_loading();
                //  clear_message(this_);

                axios.post(api_urls.admin.user.add, formData)
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
                formData.append('email', this_.obj_data.email ? this_.obj_data.email : "");
                formData.append('working_times', JSON.stringify(this_.obj_data.working_times));
                formData.append('category_ids', JSON.stringify(this_.obj_data.category_ids));

                formData.append("can_update_anyway", this_.can_update_anyway);
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.user.add + "/" + this_.obj_data.id, formData)
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

<style>
    .disable-elem {
        filter: blur(1px);
        pointer-events: none;
    }
</style>