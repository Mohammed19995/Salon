<template>
    <div class="image-input image-input-outline">

        <div class="image-input-wrapper">

            <img :id="selector_id_image" style="width: 100%;height: 100%" :src="getSrc(file1_data)"/>

            <div :id="'ancor-'+selector_id_image">
                <div class="row" style="margin-top: 18%">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-6"><i class="fas fa-download fa-3x" style="color: #0000ff94;"></i></div>
                    <div class="col-sm-2"></div>
                </div>
                <div class="row mt-2">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <a target="_blank" :href="file1_data.src" style="float:left;">
                            {{ __('admin.download_file')}}
                        </a>
                    </div>
                    <div class="col-sm-1"></div>
                </div>


            </div>

        </div>
        <span @click="setDefaultImage" data-action="cancel" data-toggle="tooltip" title=""
              style="display: block!important;"
              data-original-title="Cancel avatar"
              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"><i
                class="ki ki-bold-close icon-xs text-muted"></i>
                        </span>
    </div>
</template>

<script>
    export default {
        props: ['attr_name', 'selector_id_image', 'file1_data', 'shock_event'],
        data: function () {
            return {}
        },
        created: function () {
            this.setImage();
        },
        methods: {
            setDefaultImage: function () {
                this.setImage();
                this.$emit('clear-emit-file', this.file1_data);
            },
            setImage: function () {
                this.setFileOrImage(this.file1_data.type || this.file1_data.mime_type ,this.selector_id_image , this.file1_data );
            },
            getSrc : function (file1_data) {
                return (file1_data.type ? file1_data.type.includes('image') : file1_data.mime_type.includes('image')) ? file1_data.src : '';
            }
        },
        watch: {
            shock_event: function () {
                this.setImage();
            }
        }
    }
</script>
