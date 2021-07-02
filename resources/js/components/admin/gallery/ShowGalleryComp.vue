<template>
    <div class="row">
        <div class="col-sm-12 gallery_images">
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
                            <option v-for="type in types" :value="type.id" v-text="type.name[locale]"></option>
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
            <div class="row">

                <div class="pointer col-sm-2 mt-10" v-for="image in gallery.images">
                    <div class="image-input image-input-outline">
                        <div class="image-input-wrapper">
                            <img v-if="image.mime_type.includes('image')" width="120" height="100" :src="image.src"/>
                            <div v-else>
                                <div class="row" style="margin-top: 18%">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-6"><i class="fas fa-download fa-3x" style="color: #0000ff94;"></i></div>
                                    <div class="col-sm-2"></div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <a target="_blank" :href="image.src" style="float:left;">
                                            {{ __('admin.download_file')}}
                                        </a>
                                    </div>
                                    <div class="col-sm-1"></div>
                                </div>


                            </div>
                        </div>
                        <label @click="editGallery(image)" class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change"
                               data-toggle="tooltip" title="" data-original-title="Change avatar">
                            <i class="fa fa-pen icon-sm text-muted"></i>
                        </label>
                        <span  @click="deleteGallery(image)" data-action="cancel" data-toggle="tooltip" title="" style="display: block!important;" data-original-title="Cancel avatar"
                              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"><i
                                class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>


                    </div>
                    <div style="margin: 17px">{{__('admin.name')}} : {{image.name[locale]}}</div>
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
    </div>
</template>


<script>
    export default {
        props : ['types'] ,
        data: function () {
            return {
                gallery: {
                    images: [],
                    search: '',
                    type_id: -1,
                    page: 1,
                    next_page_url: ''
                },
                file_type : -1,
            }
        },
        created : function () {
            let this_ = this;
            this.$root.$on('add-gallery-event' , function (value) {
                console.log(value);
                value.forEach(function (file_value) {
                    this_.gallery.images.unshift(file_value);
                });

            });
            this.$root.$on('edit-gallery-event' , function (value) {
                let get_index = this_.gallery.images.findIndex(el => el.id == value.id);
                Vue.set(this_.gallery.images , get_index , value);
            });
            this.$root.$on('delete-gallery-event' , function (value) {
                let get_index = this_.gallery.images.findIndex(el => el.id == value.id);
                this_.gallery.images.splice(get_index , 1);
            });
            this.getImages(false);

        },
        methods : {
            getImages: function (push) {
                let this_ = this;
                this.gallery.page = push ? this.gallery.page++ : 1;

                this_.blockUI('.gallery_images');
                axios.get(api_urls.admin.gallery.get_remote,
                    {
                        params: {
                            search: this_.gallery.search,
                            type_id: this_.gallery.type_id,
                            file_type : this_.file_type,
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
            showMore: function () {
                if (this.gallery.next_page_url != null) {
                    this.gallery.page++;
                    this.getImages(true);
                }
            },

            editGallery : function (image) {
                this.$emit('edit-gallery' , image);
            },
            deleteGallery : function (image) {
                this.$emit('delete-gallery' , image);
            }
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
            file_type : function () {
                this.getImages(false);
            }
        }
    }
</script>