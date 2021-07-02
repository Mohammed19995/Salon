<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <gallery-comp @get-advance-emit-file="getAdvanceEmitFile" :default_image="file1_data.src" :attr_name="attr_name"
                          :selector_id_image="selector_id_image" :set_file_type="set_file_type">
            </gallery-comp>

            <success-error-msg :success="msg.success" :error="msg.error" :traffic_cop="traffic_cop" @update-anyway="updateAnyway"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4" v-for="locale in locales">
                        <label>{{__('admin.name_'+locale)}}</label>
                        <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)" class="form-control">
                    </div>

                    <div class="col-lg-4">
                        <button type="button" style="margin-top: -25%" class="btn btn-primary mr-4"
                                @click="SelectImageFromGallery(file1_data.attr_name ,file1_data.selector_id_image)">
                            {{__('admin.select_image')}}
                        </button>
                        <show-image-comp @clear-emit-file="clearEmitFile" :attr_name="file1_data.attr_name" :selector_id_image="file1_data.selector_id_image"
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
        name: getMultiLangField(),
        flag: ''
    };
    export default {
        props: ['file1_data', 'data', 'add', 'shock_event'],
        data: function () {
            return {
                attr_name : '',
                selector_id_image : '',
                set_file_type : '',

                multi_language_fields : ['name' ],

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
            },

            makeAction: function () {
                this.updateUser();
            },
            updateUser: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                formData.append("can_update_anyway", this_.can_update_anyway);
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.country.add + "/" + this_.obj_data.id, formData)
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