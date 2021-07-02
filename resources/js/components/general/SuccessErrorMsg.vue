<template>
    <div>
        <div class="alert alert-success success_msg" :class="success == '' ? 'hidden' : ''" style="margin: 10px;">
            <strong> {{ success }}</strong>
        </div>
        <div class="alert alert-danger error_msg" :class="error == '' ? 'hidden' : ''" style="margin: 10px;">
            <strong> {{ error }}</strong>
        </div>
        <div class="row" style="margin: 10px;">
            <div class="col-sm-8"></div>
            <div class="col-sm-2">
                <button v-show="traffic_cop" id="refresh-data" type="button" style="width: 100%;float: left" class="btn btn-success active ">
                    {{__('admin.refresh_data')}}
                </button>
            </div>
            <div class="col-sm-2">
                <button v-show="traffic_cop" id="refresh-anyway" @click="updateAnyway" type="button" style="width: 100%;float: left" class="btn btn-warning active ">
                    {{__('admin.update_anyway')}}
                </button>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: ['success', 'error', 'traffic_cop'],
        data: function () {
            return {}
        },
        methods: {
            updateAnyway: function () {
                this.$emit('update-anyway');
            }
        }
    }
</script>