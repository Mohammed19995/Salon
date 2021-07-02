<template>
    <div class="image-input image-input-outline">

        <div class="image-input-wrapper">
            <img :id="file1_data.selector_id_image" style="width: 100%;height: 100%" :src="selected_image"/>

            <div :id="'ancor-'+file1_data.selector_id_image">
                <div class="row" style="margin-top: 18%">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6"><i class="fas fa-download fa-3x" style="color: #0000ff94;"></i></div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <a target="_blank" :href="selected_image" style="float:left;">
                            {{ __('admin.download_file')}}
                        </a>
                    </div>
                    <div class="col-sm-1"></div>
                </div>


            </div>

        </div>
        <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change"
               data-toggle="tooltip" title="" data-original-title="">
            <i class="fa fa-pen icon-sm text-muted"></i>
            <input type="file" @change="getFile($event , '#'+file1_data.selector_id_image)" name="profile_avatar">
            <input type="hidden" name="profile_avatar_remove" value="0">
        </label>
        <span @click="setDefaultImage" data-action="cancel" data-toggle="tooltip" title="" style="display: block!important;"
              data-original-title=""
              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"><i
                class="ki ki-bold-close icon-xs text-muted"></i>
        </span>

    </div>
</template>


<script>
    export default {

        props: ['original_image', 'shock_event' , 'file1_data', 'image_name'],
        data: function () {
            return {
                selected_image: '',
            }
        },
        created: function () {
            this.setImage();
        },

        methods: {
            getFile: function (event, selector) {
                var file = event.target.files[0];

                if (file) {
                    if(file['type'].split('/')[0].includes('image')) {
                        read_url(event.target, selector);
                        $('#ancor-' + this.file1_data.selector_id_image).addClass('hidden');
                        $('#' + this.file1_data.selector_id_image).removeClass('hidden');
                    }else {
                        $('#ancor-' + this.file1_data.selector_id_image).find('a').prop('href' ,(window.URL || window.webkitURL).createObjectURL(file) );
                        $('#ancor-' + this.file1_data.selector_id_image).removeClass('hidden');
                        $('#' + this.file1_data.selector_id_image).addClass('hidden');
                    }
                    this.$emit('getEmitFile', file , this.file1_data.attr_name);
                }
            },
            setImage: function () {
                this.selected_image = this.original_image != '' ? JSON.parse(JSON.stringify(this.original_image)) : this.file1_data.src;
                this.setFileOrImage( this.file1_data.type ,  this.file1_data.selector_id_image , this.file1_data);
            },
            setDefaultImage : function () {
                this.setImage();
                this.$emit('getEmitFile' , null , this.file1_data.attr_name);
            }
        },
        watch: {
            shock_event: function (value) {
                this.setImage();
            },

        }
    }
</script>