<template>
    <div>
      
        <table class="table table-bordered print-table table-striped">

            <tbody>
            <tr>
                <th >{{__('admin.user_information')}}</th>
                <td>

                    <a :href="getEditUrl(user.id)" class="btn btn-primary font-weight-bold mr-2 add-button">
                        <i class="la la-edit"></i>{{__('admin.edit')}}</a>
                </td>
            </tr>
            <tr>
                <th width="30%">{{__('admin.user_type')}}</th>
                <td v-text="user.user_type.name[locale]"></td>
            </tr>

            <tr>
                <th width="30%">{{user.user_type == 1 ? __('admin.name') : __('admin.user_name')  }}</th>
                <td v-text="user.display_name"></td>
            </tr>


            <tr v-show="user.applicant_name">

                <th width="30%">{{__('admin.is_applicant_name')}}</th>
                <td>{{__('admin.yes')}}</td>
            </tr>
            <tr v-show="user.applicant_name">
                <td colspan="2">
                    <table class="table table-bordered print-table table-striped">
                        <tbody>
                        <tr>

                            <th width="30%">{{__('admin.applicant_name')}}</th>
                            <td v-text="user.applicant_name"></td>

                            <th width="30%">{{__('admin.applicant_phone')}}</th>
                            <td v-text="user.applicant_phone"></td>

                        </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.gender')}}</th>
                <td v-text="getGender(user)"></td>

            </tr>
            <tr v-show="user.user_type_id == 1">
                <th width="30%">{{__('admin.nationality')}}</th>
                <td v-text="user.nationality ? user.nationality.name[locale] : __('admin.without_nationality')"></td>

            </tr>
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.id_type')}}</th>
                <td v-text="user.id_type ? user.id_type.name[locale] : '-'"></td>

            </tr>
            <tr v-show="user.user_type_id == 1">
                <th width="30%">{{__('admin.id_number')}}</th>
                <td v-text="user.id_number ? user.id_number : '-'"></td>
            </tr>
            <tr v-show="user.user_type_id == 1">
                <th width="30%">{{__('admin.id_status')}}</th>
                <td v-text="user.id_type ? user.id_status_text : '-'"></td>
            </tr>
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.expire_id_date')}}</th>
                <td v-text="user.id_type ? user.expire_id_date : '-'"></td>

            </tr>

            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.dob')}}</th>
                <td v-text="user.dob"></td>

            </tr>
            <!--<tr v-show="user.user_type_id == 1">-->
                <!--<th width="30%">{{__('admin.age')}}</th>-->
                <!--<td id="age" v-text="user.age"></td>-->
            <!--</tr>-->
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.social_status')}}</th>
                <td v-text="user.social_status ? user.social_status.name[locale] :'-'"></td>

            </tr>

            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.number_of_family_members')}}</th>
                <td v-text="user.number_of_family_members"></td>

            </tr>
            <tr v-show="user.user_type_id == 1">
                <th width="30%">{{__('admin.job')}}</th>
                <td v-text="user.job"></td>
            </tr>
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.state')}}</th>
                <td v-text="user.state ? user.state.name[locale] :'-'"></td>
            </tr>
            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.city')}}</th>
                <td v-text="user.city ? user.city.name[locale] :'-'"></td>

            </tr>
            <tr v-show="user.user_type_id == 1">
                <th width="30%">{{__('admin.national_address')}}</th>

                <td>
                    <ul>
                        <li>{{__('admin.build_number')}}: <span v-text="user.build_number"></span></li>
                        <li>{{__('admin.street')}}: <span v-text="user.street"></span></li>
                        <li>{{__('admin.neighborhood')}}: <span v-text="user.neighborhood"></span></li>
                        <li>{{__('admin.postal_code')}} : <span v-text="user.postal_code"></span></li>
                        <li>{{__('admin.additional_number')}} : <span v-text="user.additional_number"></span></li>
                    </ul>
                </td>

            </tr>

            <tr v-show="user.user_type_id == 1">

                <th width="30%">{{__('admin.another_person_contact_name')}}</th>
                <td v-text="user.another_person_contact_name"></td>
            </tr>
            <tr v-if="user.user_type_id == 1">
                <th width="30%">{{__('admin.another_person_contact_phone')}}</th>
                <td v-text="user.another_person_contact_phone"></td>

            </tr>
            <tr v-if="user.user_type_id == 2">
                <th width="30%">{{__('admin.government')}}</th>
                <td v-text="user.government ? user.government.name[locale] : ''"></td>

            </tr>
            <tr v-if="user.user_type_id == 3">
                <th width="30%">{{__('admin.company_name')}}</th>
                <td v-text="user.company_name"></td>

            </tr>
            <tr>
                <th width="30%">{{__('admin.email')}}</th>
                <td v-text="user.email"></td>

            </tr>
            <tr>

                <th width="30%">{{__('admin.phone')}}</th>
                <td v-text="user.phone"></td>

            </tr>
            <tr>
                <th width="30%">{{__('admin.attachments')}}</th>
                <td>
                    <a v-for="attachment in user.attachments" target="_blank" :href="attachment.src">
                        {{__('admin.download_attachment')}}
                    </a>
                </td>

            </tr>

            </tbody>
        </table>
        
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data: function () {
            return {
                
            }
        },
        created: function () {

        },
        methods: {

            getEditUrl : function (id) {
                return endpoint+"/admin/users/"+id+"/edit";
            },
            getGender: function (user) {
                switch (user.gender) {
                    case 1 :
                        return this.__('admin.male');
                    case 2 :
                        return this.__('admin.female');
                }
            },
            
        }

    }
</script>
