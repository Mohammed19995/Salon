<template>
    <div class="image-input image-input-outline">
        <div class="image-input-wrapper">
            <img :id="selector_id_image" style="width: 100%;height: 100%" :src="selected_image"/>
        </div>
        <span @click="setDefaultImage" data-action="cancel" data-toggle="tooltip" title="" style="display: block!important;"
              data-original-title=""
              class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow"><i
                class="ki ki-bold-close icon-xs text-muted"></i>
        </span>

    </div>
</template>

<script>
    export default {
        props: ['attr_name','original_image', 'shock_event', 'default_image', 'selector_id_image', 'image_name'],
        data: function () {
            return {
                selected_image: '',
            }
        },
        created : function () {
            this.setImage();
        },
        methods : {
            setDefaultImage : function () {
                this.setImage();
                this.$emit('clear-emit-file' , {attr_name : this.attr_name});
            },
            setImage: function () {
                this.selected_image = this.original_image != '' ? JSON.parse(JSON.stringify(this.original_image)) : this.default_image;
                $('#'+this.selector_id_image).prop('src' ,this.selected_image);
            },
        },
        watch : {
            shock_event : function () {
                this.setImage();
            }
        }
    }
</script>
