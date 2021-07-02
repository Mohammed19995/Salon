<template>
    <!-- Modal-->
    <div class="modal fade" id="galleryImageForm" data-backdrop="static" tabindex="-1" role="dialog"
         aria-labelledby="staticBackdrop" aria-hidden="true">
        <div class="modal-dialog" role="document" style="max-width: 55%">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>
                    <form class="form">
                        <div class="row mb-5">
                            <div class="col-lg-6" v-for="locale in locales">
                                <label>{{__('admin.name_'+locale)}}</label>
                                <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-sm-6">
                                <label> {{__('admin.gallery_type')}}</label>
                                <select class="form-control" v-model="obj_data.type_id">
                                    <option v-for="type in types" :value="type.id" v-text="type.name[locale]"></option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <advance-image-comp @getEmitFile="getEmitFile" attr_name="src" :shock_event="shock_event"
                                                    :original_image="obj_data.src" :file1_data="file1_data"
                                                    selector_id_image="image1" :image_name="__('admin.image')">
                                </advance-image-comp>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">

                    <button type="button"  :disabled="loading" @click="makeAction"
                            class="btn btn-primary"
                            :class="loading ? 'spinner spinner-white spinner-left' : ''">
                        {{__('admin.save')}}
                    </button>
                    <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">
                        {{__('admin.cancel')}}
                    </button>

                </div>
            </div>
        </div>
    </div>
</template>


<script>
    let empty_obj = {
        name: getMultiLangField(),
        type_id: '',
        src: ''
    };

    export default {
        props : ['file1_data','types' ,  'data', 'add', 'shock_event'] ,
        created: function () {
            let this_ = this;
            this.setObjData();
        },
        data : function () {
          return {
              multi_language_fields : ['name'],
          }
        },
        methods: {
            setObjData: function () {
                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));
            },

            makeAction: function () {
                if (this.add) {
                    this.addGallery();
                } else {
                    this.updateGallery();
                }
            },
            addGallery: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });
                this_.show_loading();
                //  clear_message(this_);

                axios.post(api_urls.admin.gallery.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        if(resposne.status) {
                            this_.$root.$emit('add-gallery-event' , res.data['data']['galleries']);
                            if(resposne.status) {
                                setTimeout(function () {
                                    $('#galleryImageForm').modal('hide');
                                } , 1500);
                            }
                        }

                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateGallery: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.gallery.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        this_.$root.$emit('edit-gallery-event' , res.data['data']['gallery']);
                        if(resposne.status) {
                            setTimeout(function () {
                                $('#galleryImageForm').modal('hide');
                            } , 1500);
                        }

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