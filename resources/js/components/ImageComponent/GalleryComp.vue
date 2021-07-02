<template>

    <div class="modal fade" id="GalleryImages" tabindex="-1" role="dialog" aria-labelledby="exampleModalSizeLg"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel" v-text="__('admin.add_image')"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i aria-hidden="true" class="ki ki-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-3 vertical-line-left">
                            <div class="custom-file">
                                <input type="file" multiple class="custom-file-input" @change="getFile($event)">
                                <label class="custom-file-label"></label>

                                <div class="progress mt-3">
                                    <div class="progress-bar" role="progressbar"
                                         :style="progress_loading" :aria-valuenow="progress_loading_value"
                                         aria-valuemin="0" aria-valuemax="100">
                                        {{ progress_loading_value + '%' }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7 gallery_images vertical-line-left">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" v-model="gallery.search"
                                               placeholder="search ...">
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" v-model="gallery.type_id">
                                            <option value="-1">{{__('admin.all')}}</option>
                                            <option v-for="type in types" :value="type.id"
                                                    v-text="type.name[locale]"></option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="form-group">
                                        <select class="form-control" v-model="file_type">
                                            <option value="-1">{{__('admin.all')}}</option>
                                            <option value="1">{{__('admin.image_')}}</option>
                                            <option value="2">{{__('admin.file')}}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row vertical-scroll">
                                <div class="pointer col-sm-3 mt-3" v-for="image in gallery.images"
                                     @click="setSelectedImage(image)">

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <img :class="selected_image_ids.includes(image.id)? 'image-selected' : ''"
                                                 width="120" height="100"
                                                 v-lazy="image.mime_type.includes('image') ? image.src : getUploadsPath('galleries/file.jpg')"/>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-2"></div>
                                        <div class="col-sm-8">
                                            <span style="color: brown">{{image.name[locale]}}</span>
                                        </div>
                                        <div class="col-sm-2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-4">
                                    <button @click="showMore" type="button" class="btn btn-primary btn-sm mr-2">
                                        {{__('admin.show_more')}}
                                    </button>
                                </div>
                                <div class="col-sm-4"></div>
                            </div>

                        </div>
                        <div class="col-sm-2" v-if="!multi_file">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img v-lazy="selected_image.mime_type.includes('image') ? selected_image.src : getUploadsPath('galleries/file.jpg')"
                                             width="100" height="100">
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-sm-12 word-break">
                                    <label><span>{{__('admin.name')}}</span>
                                        : <a target="_blank" :href="selected_image.src">
                                            {{selected_image.name[locale]}}</a>
                                    </label>
                                    <br>
                                    <label><span>{{__('admin.mime_type')}}</span> : {{selected_image.mime_type}}</label>
                                    <br>
                                    <label><span>{{__('admin.size')}}</span> : {{selected_image.size}}</label>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">-->
                    <!--{{__('admin.cancel')}}-->
                    <!--</button>-->
                    <button @click="sendFile" type="button" style="width: 120px;"
                            class="btn btn-primary font-weight-bold">{{__('admin.save')}}
                    </button>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {

        props: ['default_image', 'attr_name', 'selector_id_image', 'key_has_multi', 'multi_file', 'shock_reset_file'],
        data: function () {
            return {
                gallery: {
                    images: [],
                    search: '',
                    type_id: -1,
                    page: 1,
                    next_page_url: ''
                },
                types: [],
                selected_image: {},
                selected_image_ids: [],
                file_type: -1,

                // progress
                progress_loading: 'width: 0%',
                progress_loading_value: 0,
            }
        },
        created: function () {
            var this_ = this;
            this_.init();
            setTimeout(function(){
                this_.getImages(false);
            } , 1000);
           // this.getImages(false);
            this_.getTypes();
        },
        methods: {
            init: function () {
                this.selected_image_ids = [];
                if (this.multi_file) {
                    this.selected_image = [];
                } else {
                    this.selected_image = {
                        id: '',
                        src: this.default_image,
                        name: '',
                        mime_type: '',
                        file: null
                    };
                }
            },

            getTypes: function () {
                let this_ = this;
                axios.get(api_urls.admin.gallery_types.get_remote).then(function (res) {
                    this_.types = res.data['data']['gallery_types'];
                }).catch(function (err) {
                });
            },
            getImages: function (push) {
                let this_ = this;
                this.gallery.page = push ? this.gallery.page++ : 1;

                this_.blockUI('.gallery_images');
                axios.get(api_urls.admin.gallery.get_remote,
                    {
                        params: {
                            search: this_.gallery.search,
                            type_id: this_.gallery.type_id,
                            file_type: this_.file_type,
                            page: this_.gallery.page
                        }
                    }).then(function (res) {

                    if (push) {
                        res.data['data'].forEach(function (item) {
                            this_.gallery.images.push(item);
                        });
                    } else {
                        this_.gallery.images = res.data['data'];
                    }

                    this_.gallery.next_page_url = res.data['next_page_url'];
                    this_.UnblockUI('.gallery_images');

                }).catch(function (err) {
                    this_.UnblockUI('.gallery_images');
                });
            },

            setSelectedImage: function (image) {
                if (this.multi_file) {
                    let check_in_selected = this.selected_image.findIndex(el => el.id == image.id);
                    if (check_in_selected == -1) {
                        this.selected_image.push({
                            id: image.id,
                            src: image.src,
                            name: image.name,
                            mime_type: image.mime_type,
                            size: image.size,
                            file: null
                        });
                        this.selected_image_ids.push(image.id);
                    } else {
                        this.selected_image.splice(check_in_selected, 1);
                        this.selected_image_ids.splice(this.selected_image_ids.findIndex(el => el == image.id), 1);
                    }

                } else {
                    this.selected_image = {
                        id: image.id,
                        src: image.src,
                        name: image.name,
                        mime_type: image.mime_type,
                        size: image.size,
                        file: null
                    };
                    this.selected_image_ids = [this.selected_image.id];
                }

                $('.custom-file-label').text('');
            },
            getFile: function (event) {
                let this_ = this;
                var file = event.target.files;
                this_.addGallery(file);
            },

            showMore: function () {
                if (this.gallery.next_page_url != null) {
                    this.gallery.page++;
                    this.getImages(true);
                }
            },
            sendFile: function () {

                this.$emit('get-advance-emit-file', this.selected_image, this.attr_name, this.key_has_multi, this.multi_file);
                if (!this.multi_file) {
                    this.$nextTick(function () {
                        this.setFileOrImage(this.selected_image.mime_type, this.selector_id_image, this.selected_image);
                    });
                }

                $('#GalleryImages').modal('hide');
            },

            addGallery: function (file) {
                let this_ = this;


                var formData = new FormData();
//                formData.append('name', JSON.stringify(getMultiLangField(file.name)));
                formData.append('type_id', this_.gallery.type_id == -1 ? 1 : this_.gallery.type_id);
                for (var i = 0; i < file.length; i++) {
                    formData.append('src[' + i + ']', file[i]);
                }
                this_.blockUI('.gallery_images');
                this_.progress_loading = 'width: 0%';
                this_.progress_loading_value = 0;

                axios.post(api_urls.admin.gallery.add, formData,
                    {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        },
                        onUploadProgress: function (progressEvent) {
                            var loading = parseInt(Math.round(( progressEvent.loaded * 100 ) / progressEvent.total));
                            this.progress_loading = "width:" + loading + "%";
                            this.progress_loading_value = loading;
                        }.bind(this)
                    }).then(function (res) {
                    this_.UnblockUI('.gallery_images');
                    if (res.data.status) {
                        res.data['data']['galleries'].forEach(function (value) {
                            this_.gallery.images.unshift(value);
                        });
                    }

                }).catch(function (err) {
                    handle_response(this_, err.response.data, false, true);
                    this_.UnblockUI('.gallery_images');
                });
            },
        },
        watch: {
            "gallery.search": function (value) {
                if (value.length >= 3 || value.length == 0) {
                    this.getImages(false);
                }
            },
            "gallery.type_id": function (value) {
                this.getImages(false);
            },
            file_type: function () {
                this.getImages(false);
            },
            multi_file: function (value) {
                this.init();
            },
            shock_reset_file: function (value) {
                this.init();
            }

        }
    }
</script>

<style>
    .image-selected {
        border: 4px solid #3fccc5;
    }

    img {
        border-radius: 17px;
    }

    .vertical-line-left {
        border-left: 1px solid #00000054;
    }

    .vertical-line-right {
        border-right: 1px solid #00000054;
    }

    .word-break {
        word-break: break-all;
    }

    .vertical-scroll {
        height: 400px;
        overflow-y: auto;
    }

    .file-color {
        color: #ffd400d9
    }
</style>