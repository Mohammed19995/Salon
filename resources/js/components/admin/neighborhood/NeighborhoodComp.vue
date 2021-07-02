<template>

    <div class="card card-custom gutter-b show-form hidden">
        <div class="card-header">
            <h3 class="card-title" v-text="add ?__('admin.add_data') : __('admin.edit_data') "></h3>
        </div>
        <form class="form">
            <success-error-msg :success="msg.success" :error="msg.error" :traffic_cop="traffic_cop" @update-anyway="updateAnyway"></success-error-msg>

            <div class="card-body">
                <div class="form-group row">
                    <div class="col-lg-6" v-for="locale in locales">
                        <label>{{__('admin.name_'+locale)}}</label>
                        <input type="text" v-model="obj_data.name[locale]" :placeholder="__('admin.name_'+locale)" class="form-control">
                    </div>

                </div>

                <place-comp :countries="countries" col="col-sm-6"
                            :show_city="true" :show_neighborhood="false"
                            country_selector="select_country" city_selector="select_city" neighborhood_selector="select_neighborhood"
                            type="#" :listen_to_emit="true" :add_all_option="false">
                </place-comp>
                <hr>
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-2">
                        <button type="button" style="width: 100%" :disabled="loading" @click="makeAction"
                                class="btn btn-primary mt-4"
                                :class="loading ? 'spinner spinner-white spinner-left' : ''">
                            {{__('admin.save')}}
                        </button>

                    </div>
                    <div class="col-sm-2">

                        <button type="button" style="width: 100%"
                                class="btn btn-default mt-4 cancel-button">
                            {{__('admin.cancel')}}
                        </button>

                    </div>
                </div>
            </div>

        </form>
    </div>
</template>


<script>
    let empty_obj = {
        name: getMultiLangField(),
        country_id : '',
        city_id :'',
    };
    export default {
        props: [ 'data', 'add', 'shock_event', 'countries'],
        data: function () {
            return {
                multi_language_fields : ['name' ],

                traffic_cop : false,
                can_update_anyway : 0,
            }
        },
        filters: {},
        created: function () {
            var this_= this;
            this.$root.$on('set-place-data' , function (value) {
                this_.obj_data.city_id = value.city_id;
            });
            this.setObjData();
        },
        methods: {
            setObjData: function () {

                this.traffic_cop = false;
                this.can_update_anyway = 0;

                this.obj_data = this.add ? JSON.parse(JSON.stringify(empty_obj)) : JSON.parse(JSON.stringify(this.data));

                let send_country_with_city = {country_id :null , city_id : null , neighborhood_id : null};
                if(!this.add ) {
                    send_country_with_city = {country_id :this.obj_data.city.country_id , city_id : this.obj_data.city.id ,  neighborhood_id : null};
                }
                this.$root.$emit('send-place-data' ,send_country_with_city );

            },

            makeAction: function () {
                if (this.add) {
                    this.addCity();
                } else {
                    this.updateCity();
                }
            },
            addCity: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });

                this_.show_loading();

                axios.post(api_urls.admin.neighborhood.add, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
            updateCity: function () {
                let this_ = this;
                var formData = new FormData();
                Object.keys(this.obj_data).forEach(function (key) {
                    formData.append(key,this_.multi_language_fields.includes(key) ? JSON.stringify(this_.obj_data[key]) :this_.obj_data[key] );
                });
                formData.append("can_update_anyway", this_.can_update_anyway);
                formData.append("_method", "PUT");

                this_.show_loading();
                clear_message(this_);

                axios.post(api_urls.admin.neighborhood.add + "/" + this_.obj_data.id, formData)
                    .then(function (res) {
                        this_.hide_loading();
                        let resposne = handle_response(this_, res.data, true, false);
                        table.ajax.reload();
                    }).catch(function (err) {
                    handle_response(this_, err.response.data, true, false);
                    this_.hide_loading();
                });
            },
        },
        watch: {
            shock_event: function () {
                this.setObjData();
                this.msg = {success: '', error: ''};
            }
        }

    }
</script>