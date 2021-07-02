<template>
    <transition name="fade">
        <div>
            <div class="row mb-4" v-show="ids.length > 0">
                <div class="col-sm-3">
                    <select class="form-control selectpicker select_option" v-model="option_id"
                            :data-none-selected-text="__('admin.select_option')">
                        <option v-for="option in options" :value="option.id">{{option.name}}</option>
                    </select>
                </div>
                <div class="col-sm-2">
                    <button type="button" style="width: 100%" :disabled="execute_loading" @click="showConfirmMessage"
                            class="btn btn-primary" :class="execute_loading ? 'spinner spinner-white spinner-left' : ''">
                        {{__('admin.apply_option')}}
                    </button>
                </div>

            </div>
        </div>

    </transition>

</template>


<script>
    export default {
        props : ['ids' , 'url' , 'options' , 'show_edit_product_price'],
        data : function () {
            return {
                option_id : '',
                execute_loading : false ,

                msg : {
                    success : '',
                    error : ''
                },

                product : {
                    loading : false,
                    percentage : ''
                }
            }
        },
        computed : {
            options_array : function () {
                let this_ = this;
                var options = [];
                for (const property in this_.options) {
                    options.push(this_.options[property]);
                }
                return options;
            }
        },
        methods : {
            showConfirmMessage :function () {
                let this_ = this;
                let getOption = this_.options_array.find(el => el.id == this_.option_id);
                if(!getOption) {
                    alert("الرجاء تحديد خيار");
                    return;
                }
                let html = getOption.name;
                if(getOption.id == 9 || getOption.id == 'order-bank-status-2') {
                    html += "<input type='text' class='form-control mt-3' id='reject_reason' >";
                }
                if(getOption) {
                    Swal.fire({
                        title: get_translations.admin.sure_option,
//                        text: getOption.name,
                        icon: "info",
//                        input: 'text',
                        html : html,
                        showCancelButton: !0,
                        confirmButtonText: get_translations.admin.yes_option,
                        cancelButtonText: get_translations.admin.no_option,
                        reverseButtons: !0
                    }).then(function (result) {
                        if (result.value) {
                            if($('#reject_reason').val() == ""){
                                alert('الرجاء ادخال سبب الرفض');
                                return;
                            }
                            this_.executeOption();
                        } else {
                            result.dismiss && Swal.fire(get_translations.admin.cancelled_option, get_translations.admin.didnt_option, "error");
                        }
                    });
                }
            },
            executeOption : function () {

                let this_ = this;
                let data = {
                    ids : this_.ids ,
                    option_id : this_.option_id
                };
                if(this_.option_id == 9 || this_.option_id == 'order-bank-status-2') {
                    data.reject_reason = $('#reject_reason').val();
                }

                    this_.execute_loading = true;
                axios.post(this_.url, data).then(function (res) {
                    this_.execute_loading = false;
                    var get_res = handle_response(this_ ,res.data , false , true);
                    if (get_res.status) {
                        this_.$emit('emit-execute-option' , {option_id : this_.option_id})
                    }
                }).catch(function (err) {
                    handle_response(this_, err.response.data,  false , true);
                    this_.execute_loading = false;
                    this_.$emit('emit-execute-option');
                });
            },

        }
    }
</script>

<style>
    .fade-enter-active, .fade-leave-active {
        transition: opacity .5s;
    }
    .fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
        opacity: 0;
    }
</style>