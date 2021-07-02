<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col" v-for="locale in locales">
                        <label>{{__('admin.name_' + locale)}}</label>
                        <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)"
                               class="form-control">
                    </div>
                </div>
                <button type="button"
                        class="list-group-item list-group-item-action btn-ch-all">
                    <div class="custom-control custom-checkbox">
                        <input
                                type="checkbox" class="custom-control-input"
                                id="ch_all">
                        <label class="custom-control-label" for="ch_all">تحديد
                            الكل</label>

                    </div>
                </button>
                <div class="row">
                    <div class="col-sm-3" style="margin-top: 20px;" v-for="(permission , parent) in permissions">
                        <div class="list-group">
                            <button type="button"
                                    class="list-group-item list-group-item-action active">
                                <h5 v-text="transParentPermission(parent)"></h5>
                            </button>

                            <button type="button" v-for="sub_permission in permission" :for="'ch'+sub_permission.id"
                                    class="list-group-item list-group-item-action btn-ch">
                                <div class="custom-control custom-checkbox">
                                    <input name="roles[]"
                                    :value="sub_permission.id"
                                    type="checkbox"
                                    class="custom-control-input ch_"
                                    :id="'ch'+sub_permission.id">
                                    <label class="custom-control-label"
                                           :for="'ch'+sub_permission.id" v-text="sub_permission.name[locale]"></label>
                                </div>
                            </button>


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
    };
    export default {
        props: ['data', 'add', 'shock_event' , 'permissions'],
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
                if(this.obj_data.permissions) {
                    this.setChecked(this.obj_data.permissions.map(a => a.id));
                }
                if(this.add) {
                    this.clearChecked();
                }

            },

            makeAction: function () {
                if (this.add) {
                    this.addRole();
                } else {
                    this.updateRole();
                }
            },
            addRole: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                formData.append('permission_ids' , JSON.stringify(this_.getChecked()));
                this_.show_loading();

                axios.post(api_urls.admin.role.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateRole: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key, this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) : this_.obj_data[key]);
                });
                formData.append('permission_ids' , JSON.stringify(this_.getChecked()));
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.role.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },

            transParentPermission : function (parent) {
                return this.__('permissions.'+parent);
            },
            getChecked : function () {
                var checked = [];
                $('.ch_').each(function () {
                    if ($(this).is(":checked")) {
                        checked.push($(this).val());
                    }
                });
                return checked;
            },
            setChecked : function (permission_ids) {
                $('.ch_').each(function () {
                    if(permission_ids.includes(parseInt($(this).val()))) {
                        $(this).prop("checked", true);
                    }
                });
                this.checkAll();
            },
            clearChecked : function (permission_ids) {
                $('.ch_').each(function () {
                    $(this).prop("checked", false);
                });
                this.checkAll();
            },
            checkAll : function () {
                var parent_count = 0;
                var count_= 0;
                $('.ch_').each(function () {
                    parent_count++;
                    if ($(this).is(":checked")) {
                        count_++;
                    }
                });
                if (parent_count != count_) {
                    $('#ch_all').prop('checked', false);
                } else {
                    $('#ch_all').prop('checked', true);
                }
            }

        },
        watch: {
            shock_event: function () {
                this.setObjData();
                this.msg = {success: '', error: ''};
            }
        }

    }
</script>