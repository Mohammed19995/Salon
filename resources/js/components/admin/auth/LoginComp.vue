<template>

    <div>
        <success-error-msg :success="msg.success" :error="msg.error"></success-error-msg>

        <form class="form" id="kt_login_signin_form">
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="text"
                       @keyup.enter="login" v-model="auth.email" :placeholder="__('admin.email')" name="username"
                       autocomplete="off"/>
            </div>
            <div class="form-group mb-5">
                <input class="form-control h-auto form-control-solid py-4 px-8" type="password"
                       @keyup.enter="login" v-model="auth.password" :placeholder="__('admin.password')"
                       name="password"/>
            </div>

            <button type="button" :disabled="loading" @click="login" class="btn btn-primary "
              :class="loading ? 'spinner spinner-white spinner-right' : ''">
                {{__('admin.login')}}
            </button>

        </form>

    </div>


</template>
<script>
    export default {
        data: function () {
            return {
                auth: {
                    email: '',
                    password: '',
                    url_previous : url_previous,
                },
                msg: {
                    success: '',
                    error: ''
                },
                loading: false,

            }
        },
        methods: {
            login: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.auth).forEach(function (key) {
                    formData.append(key, this_.auth[key]);
                });

                // general functions /////////////////
                this_.loading = true;
                clear_message(this_);
                //////////////////////////////////

                axios.post(api_urls.admin.auth.login, formData)
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