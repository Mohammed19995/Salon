<template>
    <div class="form-group row">
        <div :class="col">
            <label>{{__('admin.country')}}</label>
            <div class="dropdown bootstrap-select form-control dropup">
                <select class="form-control selectpicker" :class="country_selector" :id="country_selector"
                        v-model="country"
                        data-size="7" data-live-search="true"
                        tabindex="null"
                        :data-none-selected-text="__('admin.select_country')">
                    <option v-if="add_all_option" value="-1">{{__('admin.all')}}</option>
                    <option v-for="country in countries" :value="country.id">
                        {{country.name[locale]}}
                    </option>
                </select>
            </div>
        </div>
        <div :class="col" v-show="show_city">
            <label>{{__('admin.city') }}</label>
            <div class="dropdown bootstrap-select form-control dropup">
                <select class="form-control selectpicker" :class="city_selector" :id="city_selector"
                        v-model="city"
                        data-size="7" data-live-search="true"
                        tabindex="null"
                        :data-none-selected-text="__('admin.select_city')">
                    <option v-if="add_all_option" value="-1">{{__('admin.all')}}</option>
                    <option v-for="get_city in cities" :value="get_city.id">
                        {{get_city.name[locale]}}
                    </option>
                </select>
            </div>
        </div>
        <div :class="col" v-show="show_neighborhood">
            <label>{{__('admin.neighborhood')}}</label>
            <div class="dropdown bootstrap-select form-control dropup">
                <select class="form-control selectpicker" :class="neighborhood_selector" :id="neighborhood_selector"
                        v-model="neighborhood"
                        data-size="7" data-live-search="true"
                        tabindex="null"
                        :data-none-selected-text="__('admin.select_neighborhood')">
                    <option v-if="add_all_option" value="-1">{{__('admin.all')}}</option>
                    <option v-for="get_neighborhood in neighborhoods" :value="get_neighborhood.id">
                        {{get_neighborhood.name[locale]}}
                    </option>
                </select>
            </div>
        </div>
    </div>


</template>

<script>
    export default {
        props: ['countries' , 'show_city' , 'show_neighborhood' , 'col' , 'country_selector' ,'city_selector', 'neighborhood_selector' ,
            'type' , 'listen_to_emit' , 'add_all_option' , 'in_order'],
        
        created: function () {
            if(this.listen_to_emit) {
                this.$root.$on('send-place-data' , function (value) {
                    this.setObjData(value);
                }.bind(this));
            }


        },
        data: function () {
            return {
                country: '',
                city : '',
                neighborhood: '',

                cities :[],
                neighborhoods: [],
            }
        },
        methods: {
            setObjData: function (value) {
                this.country = value.country_id;
                this.city = value.city_id;
                this.neighborhood = value.neighborhood_id;
                $(this.type+this.country_selector).val(this.country).trigger('change');
                $(this.type+this.neighborhood_selector).val(this.neighborhood).trigger('change');
                $(this.type+this.city_selector).val(this.city).trigger('change');

            },
            getNeighborhoods: function (city_id) {
                var this_ = this;
                $(this_.type+this_.neighborhood_selector).prop('disabled' , true);
                $(this_.type+this_.neighborhood_selector).selectpicker('refresh');

                if(!this_.listen_to_emit) this_.neighborhood = -1;
                axios.get(api_urls.admin.neighborhood.get_city_neighborhoods + "/" + city_id).then(function (res) {

                    $(this_.type+this_.neighborhood_selector).prop('disabled' , false);
                    this_.neighborhoods = res.data['data']['neighborhoods'];

                    Vue.nextTick(function () {
                        $(this_.type+this_.neighborhood_selector).selectpicker('refresh');
                    });
                }).catch(function (err) {

                });
            },
            getCities: function (country_id) {
                var this_ = this;
                $(this_.type+this_.city_selector).val(-1);
                $(this_.type+this_.city_selector).prop('disabled' , true);
                $(this_.type+this_.city_selector).selectpicker('refresh');

                if(!this_.listen_to_emit) this_.city = -1;
                axios.get(api_urls.admin.city.get_country_cities + "/" + country_id).then(function (res) {

                    $(this_.type+this_.city_selector).prop('disabled' , false);
                    this_.cities = res.data['data']['cities'];

                    Vue.nextTick(function () {
                        $(this_.type+this_.city_selector).selectpicker('refresh');
                    });
                }).catch(function (err) {

                });
            },
            setPlaceData : function () {
                this.$root.$emit('set-place-data' , {country_id : this.country  , city_id : this.city , neighborhood_id:this.neighborhood});
            }
        },
        watch: {
            country: function (value) {
                this.getCities(value);
                this.setPlaceData();
            },
            city : function (value) {
                this.getNeighborhoods(value);
                this.setPlaceData();
            },
            neighborhood : function (value) {
                this.setPlaceData();
            },


        }

    }
</script>