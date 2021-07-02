var listeners = [];

var vm = new Vue({
    el: '#app',
    data: {
        admin: admin,
        rooms: [],
        chat_user_list: [],

        chat_info: {
            id: '',
            name: '',
            doc_id: ''
        },
        first_time: true,

        shock_event: '',

    },
    created: function () {
        this.getRooms();
    },
    methods: {
        addRooms: function () {
            // firestore_db.collection('rooms').add({ids: [1, 2]});
            // firestore_db.collection('rooms').add({ids: [1, 3]});
            // firestore_db.collection('rooms').add({ids: [2, 3]});
        },
        getRooms: function () {

            this.blockUI('#kt_chat_aside .card-body');
            let this_ = this;
            let admin_id = this.admin.id;
            let rooms = [];
            let user_ids = [];
            firestore_db.collection("rooms").where('ids', 'array-contains-any', [admin_id])
                .orderBy('last_message.time', 'desc')
                .onSnapshot(function (querySnapshot) {
                    rooms = [];
                    user_ids = [];
                    querySnapshot.forEach(function (doc) {
                        rooms.push({id: doc.id, data: doc.data(), user: null});
                        user_ids = user_ids.concat(doc.data().ids);
                        // console.log(doc.id, " => ", doc.data());
                    });

                    user_ids = user_ids.filter((v, i, a) => a.indexOf(v) === i).filter(el => el != admin_id);
                    this_.getUsers(user_ids, rooms);
                });

        },

        showRoomMessages: function (room) {
            this.chat_info.doc_id = room.id;
            this.first_time = true;
            this.shock_event = makeid(32);
        },

        changeFirstTime: function (value) {
            this.first_time = value;
        },

        // get users
        getUsers: function (user_ids, rooms) {
            let get_pluck_id = pluck_('id');
            let get_chat_user_ids = get_pluck_id(vm.chat_user_list);

            let get_user_ids_data = user_ids.filter(el => !get_chat_user_ids.includes(el));
            if(get_user_ids_data.length > 0) {
                axios.get(api_urls.admin.admin.get_list, {params: {user_ids: get_user_ids_data}}).then(function (res) {
                    vm.chat_user_list = vm.chat_user_list.concat(res.data['data']['users']);
                    vm.getRoomUserData(rooms);
                    vm.UnblockUI('#kt_chat_aside .card-body');
                }).catch(function () {
                });
            }else {
                this.getRoomUserData(rooms);
                this.UnblockUI('#kt_chat_aside .card-body');
            }

        },
        getRoomUserData : function (rooms) {
            rooms.forEach(function (room) {
                room.user = vm.chat_user_list.find(el => el.id == room.data.ids.find(el2 => el2 != vm.admin.id))
            });
            this.rooms = rooms;
        }

    }

});
