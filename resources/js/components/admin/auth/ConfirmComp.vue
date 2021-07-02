<template>

    <div>
        <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

        <form class="form" id="kt_login_signin_form">
            <div class="form-group mb-5">
                <input dir="rtl" class="form-control h-auto form-control-solid py-4 px-8" type="text"
                       @keyup.enter="confirm" v-model="code" :placeholder="__('admin.code')"
                       autocomplete="off"/>
            </div>

            <button type="button" :disabled="loading" @click="confirm" class="btn btn-primary "
                    :class="loading ? 'spinner spinner-white spinner-right' : ''">
                {{__('admin.confirm_account')}}
            </button>

        </form>

    </div>


</template>
<script>
    export default {
        data: function () {
            return {
                code : '',
                msg: {
                    success: '',
                    error: ''
                },
                loading: false,

            }
        },
        methods: {
            confirm: function () {
                let this_ = this;
                var formData = new FormData();
                formData.append('code', this_.code);

                // general functions /////////////////
                this_.loading = true;
                clear_message(this_);
                //////////////////////////////////

                axios.post(api_urls.admin.auth.confirm, formData)
                    .then(function (res) {
                        this_.loading = false;
                        let resposne = handle_response(this_, res.data, true, false);
                        if (resposne['status']) {
                            setTimeout(function () {
                                window.location = res.data['data']['redirect_url'];
                            }, 1000);
                        }
                    }).catch(function (err) {
                        handle_response(this_, err.response.data, true, false);
                        this_.loading = false;
                });
            }
        }
    }
</script>