<template>

    <div class="d-flex flex-row" id="app">

        <gallery-comp @get-advance-emit-file="getAdvanceEmitFile" :default_image="default_image" attr_name="image"
                      selector_id_image="image1">
        </gallery-comp>

        <div class="flex-row-auto offcanvas-mobile w-250px w-xxl-350px" id="kt_profile_aside">
            <div class="card card-custom card-stretch">
                <div class="card-body pt-4">

                    <div class="d-flex align-items-center">
                        <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                            <div class="symbol-label"
                                 :style="admin_image"></div>
                            <i class="symbol-badge bg-success"></i>
                        </div>
                        <div>
                            <div class="text-muted">{{data.name}}</div>
                        </div>
                    </div>

                    <div class="py-9">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <span class="font-weight-bold mr-2">{{__('admin.email')}}</span>
                            <a href="#" class="text-muted text-hover-primary">{{data.email}}</a>
                        </div>
                    </div>
                    <div class="navi navi-bold navi-hover navi-active navi-link-rounded">

                        <div class="navi-item mb-2">
                            <a @click="showShowAccountTab(true)" href="javascript:;"
                               class="navi-link py-4" :class="show_account ? 'active' : ''">
                                <span class="navi-text font-size-lg">{{__('admin.personal_information')}}</span>
                            </a>
                        </div>
                        <div class="navi-item mb-2">
                            <a @click="showShowAccountTab(false)" href="javascript:;"
                               class="navi-link py-4" :class="!show_account ? 'active' : ''">
                                <span class="navi-text font-size-lg">{{__('admin.change_password')}}</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="flex-row-fluid ml-lg-8" :class="show_account ? '': 'hidden'">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{__('admin.personal_information')}}</h3>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Form-->
                <form class="form">
                    <div class="card-body">
                        <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>
                        <!--begin::Form Group-->
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.name')}}</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="">
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                           v-model="obj_data.name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.email')}}</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="">
                                    <input class="form-control form-control-lg form-control-solid" type="text"
                                           v-model="obj_data.email">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.phone')}}</label>
                            <div class="col-lg-3 col-xl-5">
                                <div class="dropdown bootstrap-select form-control dropup">
                                    <select class="form-control selectpicker select_phone_code" v-model="obj_data.phone_code"
                                            data-size="7" data-live-search="true"
                                            tabindex="null"
                                            :data-none-selected-text="__('admin.select_phone_code')">
                                        <option v-for="country in countries" :value="country.phone_code">
                                            {{country.name[locale]}} <span> ( {{country.phone_code}} ) </span>
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-xl-4">
                                <div class="">
                                    <input type="text" v-model="obj_data.phone" :placeholder="__('admin.phone')"
                                           class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">

                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.select_image')}}</label>
                            <div class="col-lg-9 mt-4">
                                <button type="button" style="margin-top: -25%" class="btn btn-primary mr-4"
                                        @click="SelectImageFromGallery('image' , 'image1')">
                                    {{__('admin.select_image')}}
                                </button>

                                <!--<show-image-comp @clearEmitFile="clearEmitFile" attr_name="image" selector_id_image="image1"-->
                                                  <!--:default_image="obj_data.image"></show-image-comp>-->

                                <show-image-comp-v2  @clear-emit-file="clearEmitFile"  attr_name="image"
                                                    :original_image="obj_data.image" :default_image="default_image"
                                                    selector_id_image="image1" image_name="image">
                                </show-image-comp-v2>
                            </div>

                            <!--<label class="col-xl-3 col-lg-3 col-form-label text-right"></label>-->
                            <!--<div class="col-lg-9 col-xl-9">-->


                            <!--</div>-->
                        </div>

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button type="button" style="width: 100%" :disabled="loading" @click="updateProfile"
                                        class="btn btn-primary mt-4"
                                        :class="loading ? 'spinner spinner-white spinner-left' : ''">
                                    {{__('admin.save')}}
                                </button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>

                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card-->
        </div>
        <div class="flex-row-fluid ml-lg-8" :class="!show_account ? '': 'hidden'">
            <!--begin::Card-->
            <div class="card card-custom">
                <!--begin::Header-->
                <div class="card-header py-3">
                    <div class="card-title align-items-start flex-column">
                        <h3 class="card-label font-weight-bolder text-dark">{{__('admin.change_password')}}</h3>
                    </div>
                </div>
                <form class="form">
                    <div class="card-body">

                        <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>


                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.old_password')}}</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="">
                                    <input class="form-control form-control-lg form-control-solid"
                                           v-model="change_password.old_password" type="password" :placeholder="__('admin.old_password')"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.new_password')}}</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="">
                                    <input class="form-control form-control-lg form-control-solid"
                                           v-model="change_password.new_password" type="password" :placeholder="__('admin.new_password')"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-xl-3 col-lg-3 col-form-label">{{__('admin.confirmation_new_password')}}</label>
                            <div class="col-lg-9 col-xl-9">
                                <div class="">
                                    <input class="form-control form-control-lg form-control-solid" :placeholder="__('admin.confirmation_new_password')"
                                           v-model="change_password.confirmation_new_password" type="password"
                                    >
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-4"></div>
                            <div class="col-sm-4">
                                <button type="button" style="width: 100%" :disabled="loading" @click="changePassword"
                                        class="btn btn-primary mt-4"
                                        :class="loading ? 'spinner spinner-white spinner-left' : ''">
                                    {{__('admin.save')}}
                                </button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</template>
<script>
    export default {
        props: ['default_image', 'data' ,'countries'],
        data: function () {
            return {
                change_password: {
                    old_password: '',
                    new_password: '',
                    confirmation_new_password: '',
                },
                show_account: true,
            }
        },

        created: function () {
            this.obj_data = JSON.parse(JSON.stringify(this.data))
        },
        computed: {
            admin_image: function () {
                return "background-image:url('" + this.data.image + "')";
            }
        },
        methods: {
            updateProfile: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.obj_data[key]);
                });

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.profile.update, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);

                        this_.obj_data.image = resposne.data['admin']['image'];
                        admin_data.admin = resposne.data['admin'];
                        admin_header_data.admin = resposne.data['admin'];
                        vm.admin = resposne.data['admin'];


                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading('.ladda-button-demo');
                });
            },
            changePassword: function () {
                let this_ = this;

                this_.change_password.id = this.obj_data.id;
                var formData = new FormData();
                Object.keys(this.change_password).forEach(function (key) {
                    formData.append(key, this_.change_password[key]);
                });

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.profile.change_password, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        if(resposne['status']) {
                            this_.change_password = {
                                old_password: '',
                                new_password: '',
                                confirmation_new_password: ''
                            };
                        }

                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading('.ladda-button-demo');
                });
            },
            showShowAccountTab : function (show_account) {
                this.show_account = show_account;
                clear_message(this);
            }
        },
        watch : {
            obj_data : function (value) {
                alert(value);
            }
        }
    }
</script>