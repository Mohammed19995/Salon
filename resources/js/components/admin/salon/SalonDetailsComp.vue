<template>
    <div>

        <div class="card-header" style="padding: 0;">
            <div class="card-title">
                <h3 class="card-label">{{__('admin.user_data')}}</h3>
            </div>
        </div>
        <table class="table table-bordered print-table">
            <tbody>
                <tr>

                    <th width="20%">{{__('admin.name')}}</th>
                    <td width="30%" v-text="auction.user.name"></td>

                    <th width="20%">{{__('admin.image')}}</th>
                    <td width="30%">
                        <img width="50" height="50" :src="auction.user.image"/>
                    </td>
                </tr>
                <tr>
                    <th width="20%">{{__('admin.email')}}</th>
                    <td v-text="auction.user.email"></td>

                    <th width="20%">{{__('admin.phone')}}</th>
                    <td width="30%" v-text="auction.user.phone_code+'-'+auction.user.phone"></td>
                </tr>

            </tbody>
        </table>


        <div class="card-header" v-if="auction.buyer" style="padding: 0;">
            <div class="card-title">
                <h3 class="card-label">{{__('admin.buyer_data')}}</h3>
            </div>
        </div>
        <table class="table table-bordered print-table" v-if="auction.buyer">
            <tbody>
            <tr>

                <th width="20%">{{__('admin.name')}}</th>
                <td width="30%" v-text="auction.buyer ? auction.buyer.name : ''"></td>

                <th width="20%">{{__('admin.image')}}</th>
                <td width="30%">
                    <img width="50" height="50" :src="auction.buyer ? auction.buyer.image : ''"/>
                </td>
            </tr>
            <tr>
                <th width="20%">{{__('admin.email')}}</th>
                <td v-text="auction.buyer ? auction.buyer.email : ''"></td>

                <th width="20%">{{__('admin.phone')}}</th>
                <td width="30%" v-text="auction.buyer ? auction.buyer.phone_code+'-'+auction.buyer.phone : ''"></td>
            </tr>

            </tbody>
        </table>


        <div class="card-header" style="padding: 0;">
            <div class="card-title">
                <h3 class="card-label">{{__('admin.auction_data')}}</h3>
            </div>
        </div>
        <table class="table table-bordered print-table">
            <tbody>
                 <tr>
                    <th width="20%">{{__('admin.name')}}</th>
                    <td width="30%" v-text="auction.name[locale]"></td>

                    <th width="20%">{{__('admin.image')}}</th>
                    <td width="30%">
                        <a class="test-popup-link" :href="auction.image">
                            <img :src="auction.image" style="border-radius: 50%;padding: 5px;" width="50" height="50">
                        </a>
                    </td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.owner_room_name')}}</th>
                     <td width="30%" v-text="auction.owner_room ? auction.owner_room.name : ''"></td>

                     <th width="20%">{{__('admin.initial_price')}}</th>
                     <td width="30%" v-text="auction.initial_price"></td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.current_price')}}</th>
                     <td width="30%" v-text="auction.current_price"></td>

                     <th width="20%">{{__('admin.start_date')}}</th>
                     <td width="30%" v-text="auction.start_date"></td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.phone')}}</th>
                     <td width="30%" v-text="auction.phone_code +'-'+auction.phone"></td>

                     <th width="20%">{{__('admin.auction_increase_prices')}}</th>
                     <td width="30%" v-text="auction.auction_prices"></td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.auction_type')}}</th>
                     <td width="30%">
                         <span style="width: 100px;">
                            <span class="label label-lg font-weight-bold  label-inline" :class="auction.show_type_class">
                                {{auction.show_type}}
                            </span>
                        </span>
                     </td>

                     <th width="20%">{{__('admin.status')}}</th>
                     <td width="30%">
                         <span style="width: 100px;">
                            <span class="label label-lg font-weight-bold  label-inline" :class="auction.show_status_class">
                                {{auction.show_status}}
                            </span>
                        </span>
                     </td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.accept_date')}}</th>
                     <td width="30%" v-text="auction.accept_date"></td>

                     <th width="20%">{{__('admin.reject_date')}}</th>
                     <td width="30%" v-text="auction.reject_date"></td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.open_date')}}</th>
                     <td width="30%" v-text="auction.open_date"></td>

                     <th width="20%">{{__('admin.close_date')}}</th>
                     <td width="30%" v-text="auction.close_date"></td>
                 </tr>
                 <tr v-show="auction.reject_reason">
                     <th width="20%">{{__('admin.reject_reason')}}</th>
                     <td width="30%" v-text="auction.reject_reason"></td>

                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.country')}}</th>
                     <td width="30%" v-text="auction.city.country.name"></td>

                     <th width="20%">{{__('admin.city')}}</th>
                     <td width="30%" v-text="auction.city.name[locale]"></td>
                 </tr>
                 <tr>
                     <th width="20%">{{__('admin.description')}}</th>
                     <td width="30%" v-html="auction.description[locale]"></td>

                     <th width="20%">{{__('admin.images')}}</th>
                     <td width="30%">
                         <a v-for="auction_image in auction.images" style="padding: 5px;" class="test-popup-link"
                            :href="auction_image.src">
                             <img :src="auction_image.src" style="border-radius: 50%;padding: 5px;" width="50" height="50">
                         </a>
                     </td>
                 </tr>
                <!--<tr>-->
                    <!--<th>{{__('admin.address')}}</th>-->
                    <!--<td colspan="3">-->
                        <!--<map-comp :lat="auction.lat" :lng="auction.lng"></map-comp>-->
                    <!--</td>-->
                <!--</tr>-->
            </tbody>
        </table>

    </div>
</template>

<script>
    export default {
        props: ['auction' ],
        created : function () {
        }
    }
</script>