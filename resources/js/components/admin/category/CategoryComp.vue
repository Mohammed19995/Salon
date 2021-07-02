<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <gallery-comp @get-advance-emit-file="getAdvanceEmitFile" :default_image="file1_data.src" :attr_name="file1_data.attr_name"
                          :selector_id_image="file1_data.selector_id_image"></gallery-comp>
            <success-error-msg :success="msg.success" :error="msg.error" :traffic_cop="traffic_cop" @update-anyway="updateAnyway"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-4" v-for="locale in locales">
                        <label>{{__('admin.name_'+locale)}}</label>
                        <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label>{{__('admin.parent')}}</label>
                        <div class="dropdown bootstrap-select form-control dropup">
                            <select class="form-control selectpicker select_category" v-model="obj_data.parent_id"
                                    data-size="7" data-live-search="true"
                                    tabindex="null"
                                    :data-none-selected-text="__('admin.select_parent')">
                                <option value="-1">{{__('admin.main_category')}}</option>
                                <option v-for="category in categories" :value="category.id">
                                    {{category.name[locale] + ' ' + category.get_parents_name}}
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-lg-4" v-for="locale in locales">
                        <label>{{__('admin.description_'+locale)}}</label>
                        <input type="text" v-model="obj_data.description[locale]" :placeholder="__('admin.description_'+locale)" class="form-control">
                    </div>
                    <div class="col-lg-4" v-if="obj_data.parent_id != -1">
                        <label>{{__('admin.service_time')}}</label>
                        <input type="text" v-model="obj_data.service_time" :placeholder="__('admin.service_time')" class="form-control">
                    </div>
                </div>
                <div class="form-group row">

                    <div class="col-lg-4">
                        <button type="button" style="margin-top: -25%" class="btn btn-primary mr-4"
                                @click="SelectImageFromGallery(file1_data.attr_name ,file1_data.selector_id_image )">
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
        description : getMultiLangField(),
        parent_id :'',
        image: '',
        service_time : '',
    };
    export default {
        props: ['file1_data', 'data', 'add', 'shock_event' , 'categories'],
        data: function () {
            return {
                attr_name: 'image',
                selector_id_image: 'image1',

                multi_language_fields : ['name' , 'description'],

                traffic_cop : false,
                can_update_anyway : 0,

                obj_data : {},
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
                this.obj_data.parent_id = this.obj_data.parent_id == null ? -1 :this.obj_data.parent_id;
                $('.select_category').val(this.obj_data.parent_id).trigger('change');
            },

            makeAction: function () {
                if (this.add) {
                    this.addCategory();
                } else {
                    this.updateCategory();
                }
            },
            addCategory: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });
                this_.show_loading();

                axios.post(api_urls.admin.category.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        if(res.data['status']) {
                            this_.$emit('add-category' , res.data['data']['categories']);
                        }

                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateCategory: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });
                formData.append("can_update_anyway", this_.can_update_anyway);
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.category.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        if(res.data['status']) {
                            this_.$emit('update-category' , res.data['data']['categories']);
                        }
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