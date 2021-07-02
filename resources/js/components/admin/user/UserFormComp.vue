<template>

    <div class="card card-custom gutter-b ">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>{{__('admin.user_type')}}</label>
                        <select class="form-control" v-model="obj_data.user_type_id" :disabled="!add">
                            <option v-for="user_type in register_data.user_types" :value="user_type.id">
                                {{user_type.name}}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <label class="col-4 col-form-label">{{__('admin.complaint_for_another_person')}}</label>
                    <div class="col-8 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-success">
                                <input value="1" type="radio" name="is_applicant_another_person"
                                       v-model="obj_data.is_applicant_another_person">
                                <span></span>{{__('admin.yes')}}</label>
                            <label class="radio radio-success">
                                <input value="0" type="radio" name="is_applicant_another_person"
                                       checked="checked" v-model="obj_data.is_applicant_another_person">
                                <span></span>{{__('admin.no')}}</label>
                        </div>
                    </div>
                </div>
                <div class="form-group row" v-show="obj_data.is_applicant_another_person == 1 && obj_data.user_type_id == 1">
                    <div class="col">
                        <label>{{__('admin.applicant_name')}}</label>
                        <input type="text" :placeholder="__('admin.applicant_name')" class="form-control"
                               v-model="obj_data.applicant_name">
                    </div>
                    <div class="col">
                        <label>{{__('admin.applicant_phone')}}</label>
                        <input type="text" :placeholder="__('admin.applicant_name')" class="form-control"
                               v-model="obj_data.applicant_phone">
                    </div>
                </div>
                <h4 v-show="obj_data.user_type_id == 1">{{__('admin.complainant_information')}}</h4>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col">
                        <label>{{__('admin.first_name')}}</label>
                        <input type="text" :placeholder="__('admin.first_name')" class="form-control"
                               v-model="obj_data.first_name">
                    </div>
                    <div class="col">
                        <label>{{__('admin.middle_name')}}</label>
                        <input type="text" :placeholder="__('admin.middle_name')" class="form-control"
                               v-model="obj_data.middle_name">
                    </div>
                    <div class="col">
                        <label>{{__('admin.last_name')}}</label>
                        <input type="text" :placeholder="__('admin.last_name')" class="form-control"
                               v-model="obj_data.last_name">
                    </div>

                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <label class="col-1 col-form-label">{{__('admin.gender')}}</label>
                    <div class="col-3 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-success">
                                <input value="1" type="radio" name="gender"
                                       v-model="obj_data.gender">
                                <span></span>{{__('admin.male')}}</label>
                            <label class="radio radio-success">
                                <input value="2" type="radio" name="gender"
                                       checked="checked" v-model="obj_data.gender">
                                <span></span>{{__('admin.female')}}</label>
                        </div>
                    </div>

                    <label class="col-1 col-form-label">{{__('admin.nationality')}}</label>
                    <div class="col-3 col-form-label">
                        <div class="radio-inline">
                            <label class="radio radio-success">
                                <input value="1" type="radio" name="nationality"
                                       v-model="obj_data.is_sadui">
                                <span></span>{{__('admin.sadui')}}
                            </label>

                            <label class="radio radio-success">
                                <input value="2" type="radio" name="nationality"
                                       checked="checked" v-model="obj_data.is_sadui">
                                <span></span>{{__('admin.not_saudi')}}
                            </label>

                            <label class="radio radio-success">
                                <input value="3" type="radio" name="nationality"
                                       checked="checked" v-model="obj_data.is_sadui">
                                <span></span>{{__('admin.without_nationality')}}
                            </label>
                        </div>
                    </div>

                    <div class="col-4" v-show="obj_data.is_sadui == 2">
                        <label>{{__('admin.nationality')}}</label>
                        <select class="form-control" v-model="obj_data.nationality_id">
                            <option v-for="nationality in register_data.nationalities"  v-show="!nationality.is_saudi"
                                    :value="nationality.id">{{nationality.name}}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col-lg-2">
                        <label>{{__('admin.id_type')}}</label>
                        <select class="form-control" v-model="obj_data.id_type_id">
                            <option v-for="id_type in select_id_types" :value="id_type.id">
                                {{id_type.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.id_number')}}</label>
                        <input type="text" :placeholder="__('admin.id_number')" class="form-control"
                               v-model="obj_data.id_number">
                    </div>

                    <div class="col-lg-2">
                        <label>{{__('admin.id_status')}}</label>
                        <select class="form-control" v-model="obj_data.id_statue">
                            <option value="1" >{{__('admin.id_status_pending')}}</option>
                            <option value="0" >{{__('admin.id_status_expired')}}</option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.expire_id_date')}}</label>
                        <input type="text" class="form-control" :placeholder="__('admin.expire_id_date')" id="expire_id_date">
                    </div>

                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col-lg-4">
                        <label>{{__('admin.social_status')}}</label>
                        <select class="form-control" v-model="obj_data.social_status_id">
                            <option v-for="social_status in register_data.social_statuses" :value="social_status.id">
                                {{social_status.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-sm-4">
                        <label>{{__('admin.number_of_family_members')}}</label>
                        <input type="text" :placeholder="__('admin.number_of_family_members')" class="form-control"
                               v-model="obj_data.number_of_family_members">
                    </div>
                    <div class="col-sm-4">
                        <label>{{__('admin.job')}}</label>
                        <input type="text" :placeholder="__('admin.job')" class="form-control"
                               v-model="obj_data.job">
                    </div>
                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col-lg-4">
                        <label>{{__('admin.state')}}</label>
                        <select class="form-control" v-model="obj_data.state_id">
                            <option v-for="state in register_data.states" :value="state.id">
                                {{state.name}}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.city')}}</label>
                        <select class="form-control select_city" v-model="obj_data.city_id">
                            <option v-for="city in cities" :value="city.id">
                                {{city.name[locale]}}
                            </option>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.dob')}}</label>
                        <input type="text" class="form-control" :placeholder="__('admin.dob')" id="dob">
                    </div>
                </div>

                <h4 v-show="obj_data.user_type_id == 1">{{__('admin.national_address')}}</h4>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col">
                        <label>{{__('admin.build_number')}}</label>
                        <input type="text" :placeholder="__('admin.build_number')" class="form-control"
                               v-model="obj_data.build_number">
                    </div>
                    <div class="col">
                        <label>{{__('admin.street')}}</label>
                        <input type="text" :placeholder="__('admin.street')" class="form-control"
                               v-model="obj_data.street">
                    </div>
                    <div class="col">
                        <label>{{__('admin.neighborhood')}}</label>
                        <input type="text" :placeholder="__('admin.neighborhood')" class="form-control"
                               v-model="obj_data.neighborhood">
                    </div>

                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col">
                        <label>{{__('admin.postal_code')}}</label>
                        <input type="text" :placeholder="__('admin.postal_code')" class="form-control"
                               v-model="obj_data.postal_code">
                    </div>
                    <div class="col">
                        <label>{{__('admin.additional_number')}}</label>
                        <input type="text" :placeholder="__('admin.additional_number')" class="form-control"
                               v-model="obj_data.additional_number">
                    </div>

                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 1">
                    <div class="col">
                        <label>{{__('admin.another_person_contact_name')}}</label>
                        <input type="text" :placeholder="__('admin.another_person_contact_name')" class="form-control"
                               v-model="obj_data.another_person_contact_name">
                    </div>
                    <div class="col">
                        <label>{{__('admin.another_person_contact_phone')}}</label>
                        <input type="text" :placeholder="__('admin.another_person_contact_phone')" class="form-control"
                               v-model="obj_data.another_person_contact_phone">
                    </div>

                </div>

                <h4 v-show="obj_data.user_type_id == 1">{{__('admin.login_information')}}</h4>
                <div class="form-group row" v-show="obj_data.user_type_id == 2">
                    <div class="col">
                        <label>{{__('admin.username')}}</label>
                        <input type="text" :placeholder="__('admin.username')" class="form-control"
                               v-model="obj_data.username">
                    </div>
                    <div class="col">
                        <label>{{__('admin.governments')}}</label>
                        <select class="form-control" v-model="obj_data.government_id">
                            <option v-for="government in register_data.governments" :value="government.id">
                                {{government.name}}
                            </option>
                        </select>
                    </div>

                </div>
                <div class="form-group row" v-show="obj_data.user_type_id == 3">
                    <div class="col">
                        <label>{{__('admin.username')}}</label>
                        <input type="text" :placeholder="__('admin.username')" class="form-control"
                               v-model="obj_data.username">
                    </div>

                    <div class="col">
                        <label>{{__('admin.company_name')}}</label>
                        <input type="text" :placeholder="__('admin.company_name')" class="form-control"
                               v-model="obj_data.company_name">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col">
                        <label>{{__('admin.email')}}</label>
                        <input type="text" :placeholder="__('admin.email')" class="form-control"
                               v-model="obj_data.email">
                    </div>
                    <div class="col">
                        <label>{{__('admin.phone')}}</label>
                        <input type="text" :placeholder="__('admin.phone')" class="form-control"
                               v-model="obj_data.phone">
                    </div>
                    <div class="col">
                        <label>{{__('admin.password')}}</label>
                        <input type="password" :placeholder="__('admin.password')" class="form-control"
                               v-model="obj_data.password">
                    </div>

                </div>
                <hr>
                <div class="row">
                    <div class="col"></div>
                    <div class="col">
                        <button type="button" style="width: 100%" :disabled="loading" @click="makeAction"
                                class="btn btn-primary mt-4"
                                :class="loading ? 'spinner spinner-white spinner-left' : ''">
                            {{__('admin.save')}}
                        </button>
                    </div>
                    <div class="col"></div>

                </div>

            </div>

        </form>
    </div>
</template>


<script>
    let empty_obj = {

        user_type_id: 1,
        is_applicant_another_person: 0,

        first_name: '',
        middle_name: '',
        last_name: '',

        applicant_name: '',
        applicant_phone: '',

        gender: 1,
        is_sadui :1,

        id_type_id : '',
        id_number : '',
        id_statue : 1 ,

        social_status_id : '',
        number_of_family_members : 0 ,
        job : '',
        nationality_id : '',
        state_id : '',
        city_id : '',
        phone : '',

        build_number : '',
        street : '',
        neighborhood : '',
        postal_code : '',
        additional_number : '',
        another_person_contact_name : '',
        another_person_contact_phone : '',

        email : '',
        password : '',
        username : '',
        government_id : '',
        company_name : '',

    };
    export default {
        props: ['file1_data', 'data', 'add', 'shock_event', 'countries', 'register_data'],
        data: function () {
            return {
                attr_name: 'image',
                selector_id_image: 'image1',

                obj_data: {},
                cities : [],
            }
        },
        filters: {},
        created: function () {
            this.setObjData();
        },
        computed : {
          select_id_types : function () {

              if(this.obj_data.is_sadui == 1) {
                  return this.register_data.id_types.filter(el => el.for_saudi);
              }else {
                  return this.register_data.id_types.filter(el => el.for_not_saudi);
              }

          }
        },
        methods: {
            setObjData: function () {
                let this_ = this;
                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
                if(!this.add) {
                    Vue.nextTick(function () {
                        $('#expire_id_date').val(this_.obj_data.expire_id_date);
                        $('#expire_id_date').datepicker({
                            format: 'yyyy-mm-dd',
                            rtl: KTUtil.isRTL(),
                            orientation: "top left",
                            todayHighlight: true,
                        });

                        $('#dob').val(this_.obj_data.dob);
                        $('#dob').datepicker({
                            format: 'yyyy-mm-dd',
                            rtl: KTUtil.isRTL(),
                            orientation: "top left",
                            todayHighlight: true,
                        });
                    });
                }
                $('.select_phone_code').val(this.obj_data.phone_code).trigger('change');
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
                if(this_.obj_data.is_sadui == 1) {
                    this_.obj_data.nationality_id = this_.register_data.nationalities.find(el => el.is_saudi)?.id
                }else if(this_.obj_data.is_sadui == 3) {
                    this_.obj_data.nationality_id = null;
                }
                this_.obj_data.expire_id_date = $('#expire_id_date').val();
                this_.obj_data.dob = $('#dob').val();
                this_.obj_data.have_location_data = 1;
                this_.obj_data.home_number = 0;
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.obj_data[key]);
                });
                this_.show_loading();
                //  clear_message(this_);

                axios.post(api_urls.admin.user.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
//                        setTimeout(function () {
//                            window.location = "";
//                        } , 15000);
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateUser: function () {
                let this_ = this;
                var formData = new FormData();

                if(this_.obj_data.is_sadui == 1) {
                    this_.obj_data.nationality_id = this_.register_data.nationalities.find(el => el.is_saudi).id
                }else if(this_.obj_data.is_sadui == 3) {
                    this_.obj_data.nationality_id = null;
                }
                this_.obj_data.expire_id_date = $('#expire_id_date').val();
                this_.obj_data.dob = $('#dob').val();
                this_.obj_data.have_location_data = 1;
                this_.obj_data.home_number = 0;

                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.obj_data[key]);
                });
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.user.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },

            getCities: function (state_id) {
               if(state_id == "") return;
                var this_ = this;
                $('.select_city').prop('disabled' , true);

                if(!this_.listen_to_emit) this_.city = -1;
                axios.get(api_urls.admin.city.get_state_cities + "/" + state_id).then(function (res) {

                    $('.select_city').prop('disabled' , false);
                    this_.cities = res.data['data']['cities'];

                }).catch(function (err) {

                });
            },
        },
        watch: {
            "obj_data.is_applicant_another_person": function (value) {
                if (value == 0) {
                    this.obj_data.applicant_name = "";
                    this.obj_data.applicant_phone = "";
                }
            },
            "obj_data.is_sadui": function (value) {

            },
            "obj_data.state_id": function (value) {
                this.getCities(value);
            },
            shock_event: function () {
                this.setObjData();
                this.msg = {success: '', error: ''};
            }
        }

    }
</script>