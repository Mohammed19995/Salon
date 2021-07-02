<template>
    <!--begin::Content-->
    <div class="flex-row-fluid ml-lg-8" id="kt_chat_content" v-show="doc_id != ''">
        <!--begin::Card-->
        <div class="card card-custom">
            <!--begin::Header-->
            <div class="card-header align-items-center px-4 py-3">
                <div class="text-left flex-grow-1">
                    <!--begin::Aside Mobile Toggle-->
                    <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md d-lg-none"
                            id="kt_app_chat_toggle">
														<span class="svg-icon svg-icon-lg">
															<!--begin::Svg Icon | path:{{url('')}}/admin_assets/media/svg/icons/Communication/Adress-book2.svg-->
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                     height="24px" viewBox="0 0 24 24" version="1.1">
																<g stroke="none" stroke-width="1" fill="none"
                                                                   fill-rule="evenodd">
																	<rect x="0" y="0" width="24" height="24"></rect>
																	<path d="M18,2 L20,2 C21.6568542,2 23,3.34314575 23,5 L23,19 C23,20.6568542 21.6568542,22 20,22 L18,22 L18,2 Z"
                                                                          fill="#000000" opacity="0.3"></path>
																	<path d="M5,2 L17,2 C18.6568542,2 20,3.34314575 20,5 L20,19 C20,20.6568542 18.6568542,22 17,22 L5,22 C4.44771525,22 4,21.5522847 4,21 L4,3 C4,2.44771525 4.44771525,2 5,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z"
                                                                          fill="#000000"></path>
																</g>
															</svg>
                                                            <!--end::Svg Icon-->
														</span>
                    </button>
                    <!--end::Aside Mobile Toggle-->
                </div>
                <div class="text-center flex-grow-1">
                    <div class="text-dark-75 font-weight-bold font-size-h5">Matt Pears</div>
                    <div>
                        <span class="label label-sm label-dot label-success"></span>
                        <span class="font-weight-bold text-muted font-size-sm" v-text="doc_id"></span>
                    </div>

                </div>
                <div class="text-right flex-grow-1">
                    <!--begin::Dropdown Menu-->
                    <div class="dropdown dropdown-inline">
                        <button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:{{url('')}}/admin_assets/media/svg/icons/Communication/Add-user.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<polygon points="0 0 24 0 24 24 0 24"></polygon>
																		<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"></path>
																		<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z"
                                                                              fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
                                                                <!--end::Svg Icon-->
															</span>
                        </button>
                    </div>
                    <!--end::Dropdown Menu-->
                </div>
            </div>
            <!--end::Header-->
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Scroll-->
                <div class="scroll scroll-pull ps ps--active-y" data-mobile-height="350">
                    <!--begin::Messages-->
                    <div class="messages scroll-y">
                        <div class="row">
                            <div class="col-sm-5"></div>
                            <div class="col-sm-4">
                                <button type="button" @click="showMoreMessages" :disabled="show_more_loading"
                                        class="btn btn-primary btn-sm mr-2 show-more-btn"
                                        :class="show_more_loading ? 'spinner spinner-white spinner-left' : ''">
                                    عرض المزيد
                                </button>
                            </div>
                            <div class="col-sm-4"></div>
                        </div>
                        <!--begin::Message In-->
                        <div v-for="message in messages" class="d-flex flex-column mb-5"
                             :class="message.data.from_user_id == admin.id ? 'align-items-start': ['align-items-end' , 'mr-5']">
                            <div class="d-flex align-items-center" v-if="message.data.from_user_id == admin.id">
                                <div class="symbol symbol-circle symbol-40 mr-3">
                                    <img alt="Pic" src="http://localhost/laravel7/lara7/public/admin_assets/media/users/300_12.jpg">
                                </div>
                                <div>
                                    <span class="text-muted font-size-sm"
                                          v-text="convertTimeToHuman(message.data.time)"></span>
                                </div>
                            </div>
                            <div class="d-flex align-items-center" v-else>
                                <div>
                                    <span class="text-muted font-size-sm"
                                          v-text="convertTimeToHuman(message.data.time)"></span>
                                </div>
                                <div class="symbol symbol-circle symbol-40 ml-3">
                                    <img alt="Pic" src="http://localhost/laravel7/lara7/public/admin_assets/media/users/300_12.jpg">
                                </div>
                            </div>
                            <div class="mt-2 rounded p-5 bg-light-success
                                    text-dark-50 font-weight-bold font-size-lg max-w-400px"
                                 :class="message.data.from_user_id == admin.id ? 'text-left': 'text-right'"
                                 v-text="message.data.content">
                            </div>
                        </div>
                        <!--end::Message In-->
                    </div>
                    <!--end::Messages-->
                </div>
                <!--end::Scroll-->
            </div>


            <!--end::Body-->

            <!--begin::Footer-->
            <div class="card-footer align-items-center">
                <!--begin::Compose-->
                <textarea class="form-control border-0 p-0" rows="2"
                          v-model="message" @keyup.enter="sendMessage"
                          placeholder="Type a message">
                        </textarea>
                <div class="d-flex align-items-center justify-content-between mt-5">
                    <div class="mr-3">
                        <a href="#" class="btn btn-clean btn-icon btn-md mr-1">
                            <i class="flaticon2-photograph icon-lg"></i>
                        </a>
                        <a href="#" class="btn btn-clean btn-icon btn-md">
                            <i class="flaticon2-photo-camera icon-lg"></i>
                        </a>
                    </div>
                    <div>
                        <button type="button" @click="sendMessage"
                                class="btn btn-primary btn-md text-uppercase font-weight-bold py-2 px-6">
                            Send
                        </button>
                    </div>
                </div>
                <!--begin::Compose-->
            </div>
            <!--end::Footer-->
        </div>
        <!--end::Card-->
    </div>
    <!--end::Content-->
</template>

<script>
    export default {
        props : ['doc_id' ,'first_time' ,'admin' , 'shock_event' ],
        data : function(){
            return {
                show_more_loading : false ,
                lastVisible: null,
                message : '',

                messages : [],
            }
        },
        methods : {

            setMessageData: function (type, content, from_user_id, time) {
                return {
                    type: type,
                    content: content,
                    from_user_id: from_user_id,
                    time: time,
                };
            },
            sendMessage: function () {
                var set_message = this.setMessageData("text", this.message, admin.id, firebase.firestore.FieldValue.serverTimestamp());
                var docRef = firestore_db.collection("chats/" + (this.doc_id) + "/messages");
                var docRefRoom = firestore_db.collection('rooms').doc(this.doc_id).update({last_message : set_message});
                docRef.add(set_message);

                this.message = "";
            },

            showMoreMessages : function () {
                this.getMoreMessages(this.doc_id);
            },
            getMessages: function (doc_id) {
                var this_ = this;
                this.messages = [];
                var collection = "chats/" + (doc_id) + "/messages";
                var docRef = firestore_db.collection(collection);
                if (listeners.length != 0) {
                    listeners.forEach(listener => listener())
                }
                var listener = docRef.orderBy('time', 'desc').limit(5).onSnapshot(function (snapshot) {

                    if (this_.first_time) {
                        this_.lastVisible = snapshot.docs[snapshot.docs.length - 1];
                    }
                    snapshot.docChanges().forEach(function (change) {
                        if (change.type === "added") {
                            if (this_.first_time) {
                                this_.messages.unshift({id: change.doc.id, data: change.doc.data()});
                            } else {
                                this_.messages.push({id: change.doc.id, data: change.doc.data()});
                            }

                        }
                        if (change.type === "modified") {
                            this_.updateTimeWhenAddMessage(change.doc.id, change.doc.data());
                        }
                    });
                    this_.$emit('change-first-time' , false);
                    this_.$nextTick(function () {
                        // var messagesEl = KTUtil.find(KTUtil.getById('kt_chat_content'), '.messages');
                        // var scrollEl = KTUtil.find(KTUtil.getById('kt_chat_content'), '.scroll');
                        //
                        // scrollEl.scrollTop = parseInt($('.messages')[0].scrollHeight - $('.messages')[0].clientHeight);
                        scrollDownDiv('.messages');
                    });
                });
                listeners.push(listener);

            },
            getMoreMessages: function (doc_id) {
                var this_ = this;
                var collection = "chats/" + (doc_id) + "/messages";
                var docRef = firestore_db.collection(collection);
                if(this_.lastVisible == undefined) return;
                // show loading
                this.show_more_loading = true;

                var listener = docRef.orderBy('time', 'desc').limit(5)
                    .startAfter(this_.lastVisible).onSnapshot(function (snapshot) {

                        this_.lastVisible = snapshot.docs[snapshot.docs.length - 1];
                        snapshot.docChanges().forEach(function (change) {
                            if (change.type === "added") {
                                this_.messages.unshift({id: change.doc.id, data: change.doc.data()});
                            }
                            if (change.type === "modified") {
                                this_.updateTimeWhenAddMessage(change.doc.id, change.doc.data());
                            }
                        });
                        this_.show_more_loading = false;
                    }, function (error) {
                        console.log(error);
                    });
                listeners.push(listener);

            },

            updateTimeWhenAddMessage: function (id, data) {
                let index = this.messages.findIndex(el => el.id == id);
                Vue.set(this.messages, index, {id: id, data: data});
            },

        },
        watch : {
            shock_event : function () {
                this.getMessages(this.doc_id);
            }
        }
    }
</script>