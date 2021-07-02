<template>

    <div class="card card-custom gutter-b">
        <div class="card-header">
            <h3 class="card-title" v-text="__('admin.settings')"></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.place_' + locale)}}</label>
                        <input type="text" v-model="obj_data.place[locale]" :placeholder="__('admin.place_'+locale)"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label>{{__('admin.phone')}}</label>
                        <input type="text" v-model="obj_data.phone[locale]" :placeholder="__('admin.phone')"
                               class="form-control">
                    </div>
                    <div class="col">
                        <label>{{__('admin.email')}}</label>
                        <input type="text" v-model="obj_data.email[locale]" :placeholder="__('admin.email')"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label>{{__('admin.app_ratio')}}</label>
                        <input type="text" v-model="obj_data.app_ratio[locale]" :placeholder="__('admin.app_ratio')"
                               class="form-control">
                    </div>

                </div>
                <div class="form-group row">
                    <div class="col">
                        <label>{{__('admin.facebook')}}</label>
                        <input type="text" v-model="obj_data.facebook[locale]" :placeholder="__('admin.facebook')"
                               class="form-control">
                    </div>
                    <div class="col">
                        <label>{{__('admin.twitter')}}</label>
                        <input type="text" v-model="obj_data.twitter[locale]" :placeholder="__('admin.twitter')"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col">
                        <label>{{__('admin.instagram')}}</label>
                        <input type="text" v-model="obj_data.instagram[locale]" :placeholder="__('admin.instagram')"
                               class="form-control">
                    </div>
                    <div class="col">
                        <label>{{__('admin.snapchat')}}</label>
                        <input type="text" v-model="obj_data.snapchat[locale]" :placeholder="__('admin.snapchat')"
                               class="form-control">
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.privacy_policy_' + locale)}}</label>
                        <div class="custom-summernote" :class="'custom-summernote-privacy_policy-'+locale"></div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.prevented_goods_' + locale)}}</label>
                        <div class="custom-summernote" :class="'custom-summernote-prevented_goods-'+locale"></div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.about_us_' + locale)}}</label>
                        <div class="custom-summernote" :class="'custom-summernote-about_us-'+locale"></div>

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.about_app_' + locale)}}</label>
                        <div class="custom-summernote" :class="'custom-summernote-about_app-'+locale"></div>

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

    export default {
        props: ['data'],
        data: function () {
            return {
                multi_language_fields : ['place','phone','email','facebook','twitter','instagram','snapchat',
                    'privacy_policy' , 'prevented_goods' , 'about_us' , 'about_app' , 'app_ratio'],
            }
        },
        filters: {},
        created: function () {
            this.setObjData();
        },
        methods: {
            setObjData: function () {
                let this_ = this;
                this.obj_data = JSON.parse(JSON.stringify(this.data));

                Vue.nextTick(function () {
                    this_.setSummernoteData(this_.obj_data.privacy_policy, 'privacy_policy');
                    this_.setSummernoteData(this_.obj_data.prevented_goods, 'prevented_goods');
                    this_.setSummernoteData(this_.obj_data.about_us, 'about_us');
                    this_.setSummernoteData(this_.obj_data.about_app, 'about_app');
                });

            },

            makeAction: function () {
                this.updateSetting();
            },
            updateSetting: function () {
                let this_ = this;
                var formData = new FormData();
                this.getSummernoteData(this.obj_data.privacy_policy, 'privacy_policy');
                this.getSummernoteData(this.obj_data.prevented_goods, 'prevented_goods');
                this.getSummernoteData(this.obj_data.about_us, 'about_us');
                this.getSummernoteData(this.obj_data.about_app, 'about_app');


                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.setting.update, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },

            getSummernoteData: function (obj, attr) {
                Object.keys(getMultiLangField()).forEach(key => {
                    obj[key] = $('.custom-summernote-' + attr + '-' + key).summernote('code');
                });

            },
            setSummernoteData: function (obj, attr) {
                Object.keys(getMultiLangField()).forEach(key => {
                    $('.custom-summernote-' + attr + '-' + key).summernote("code", obj[key]);
                });

            }
        },
        watch: {
        }

    }
</script>