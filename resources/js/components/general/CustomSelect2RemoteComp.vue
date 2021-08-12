<template>
    <select class="form-control" :multiple="multi"></select>
</template>


<script>
    export default {
        props : ['data' , 'placeholder' , 'url' , 'multi'],
        mounted() {
            var this_ = this;
            this.$nextTick(function () {
                $(this_.$el).select2({
                    placeholder: this_.placeholder,
                    allowClear: !0,
                    ajax: {
                        url: get_url + this_.url,
                        dataType: "json",
                        delay: 250,

                        data: function (e) {
                            return {q: e.term, page: e.page}
                        },
                        processResults: function (e, t) {
                            return t.page = t.page || 1, {results: e.items, pagination: {more: e.incomplete_results}}
                        },
                        cache: !0
                    },
                    escapeMarkup: function (e) {
                        return e
                    },
                    minimumInputLength: 3,
                    language: {
                        inputTooShort: function () {
                            return 'الرجاء إدخال 3 أحرف أو أكثر';
                        }
                    },
                    templateResult: function (e) {
                        if (e.loading) return "جار البحث ...";
                        return e.name || e.text;
                    },
                    templateSelection: function (e) {
                        return e.name || e.text;
                    },
                }).on('change' , function () {
                    this_.$emit("input", $(this_.$el).val());
                })
            })
        },
        watch : {
            data : function (value) {

                var this_ = this;
                if(this_.multi) {

                    this_.$nextTick(function () {
                        for(var i=0 ; i < value.length ; i++) {
                            $(this_.$el).append(new Option(value[i].name, value[i].id, true, true));
                        }
                    });

                }else {
                    this_.$nextTick(function () {
                        $(this_.$el).append(new Option(value.name, value.id, true, true));
                    });
                }
            }
        }
    }
</script>