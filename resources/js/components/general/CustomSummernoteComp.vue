<template>
    <div v-html="content"></div>
</template>


<script>
    export default {
        props : ['content'],
        mounted() {

            let this_ = this;
            this_.$nextTick(function () {
                $(this_.$el).summernote({
                    tabsize: 3,
                    height: 150 ,
                    callbacks: {
                        onChange: function(contents, $editable) {
                            this_.$emit("input", contents);
                        }
                    }
                });
                this_.$nextTick(function () {
                    $(this_.$el).summernote('code' , this_.content);
                })
            })
        },

        watch : {
            content : function (value) {
                $(this.$el).summernote('code' , value);
            }
        }
    }
</script>
