<template>
    <div class="form-group">
        <label class="col-sm-2 control-label">{{image_name}}</label>
        <div class="col-sm-10">
            <div class="row">
                <div class="col-sm-9">
                    <input type="file" @change="getFile($event , '#'+selector_id_image)" class="form-control">
                </div>
                <div class="col-sm-3">
                    <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <img :id="selector_id_image" width="100" height="100"
                                             :src="selected_image">
                                    </span>
                    </div>
                </div>
            </div>

        </div>

    </div>
</template>


<script>
    export default {

        props: ['original_image' ,'shock_event', 'default_image', 'selector_id_image', 'image_name'],
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
                    read_url(event.target, selector);
                    this.$emit('getEmitFile', file);
                }
            },
            setImage : function () {
                this.selected_image = this.original_image != '' ? JSON.parse(JSON.stringify(this.original_image)) : this.default_image;
            },
        },
        watch: {
            shock_event : function (value) {
                this.setImage();
            }
        }
    }
</script>