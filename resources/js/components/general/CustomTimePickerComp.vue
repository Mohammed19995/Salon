<template>
    <div>
        <input type="text" class="form-control" :value="data" :placeholder="__('admin.start_date')">
    </div>
</template>


<script>
    export default {
        props : ['data'],
        mounted() {
            var this_ = this;
            this.$nextTick(function () {
                $(this_.$el).timepicker({
                    defaultTime: this_.data,
                    todayHighlight: true,
                    autoclose: true,
                    ampm: true,
                    showMeridian: true,
                    minuteStep: 5,
                    format: 'hh:ii p',
                }).on("change", function() {
                    this_.$emit("input", this.value);
                });
            })
        },
        watch : {
            data : function (value) {
                $(this.$el).timepicker('setTime' , value);
            }
        }
    }
</script>