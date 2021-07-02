@extends('admin.layout')

@push('css')

    <style>

        .messages::-webkit-scrollbar {
            width: 4px;
        }
        /* Track */
        .messages::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        /* Handle */
        .messages::-webkit-scrollbar-thumb {
            background: rgba(131,133,123,0.42)
        }

        /* Handle on hover */
        .messages::-webkit-scrollbar-thumb:hover {
            background: rgba(105,107,97,0.42)
        }

        .scroll-y {
            height: 400px;
            overflow-y: auto;
            overflow-x: hidden;
        }

        .show-more-btn {
            padding-top: 2px;
            padding-bottom: 5px;
        }
    </style>
@endpush

@section('content')
    <div id="app">

        <!--begin::Chat-->
        <div class="d-flex flex-row">
            <!--begin::Aside-->
            <div class="flex-row-auto offcanvas-mobile w-350px w-xl-400px offcanvas-mobile-on" id="kt_chat_aside">
                <!--begin::Card-->
                <div class="card card-custom">
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin:Search-->
                        <div class="input-group input-group-solid">
                            <div class="input-group-prepend">
														<span class="input-group-text">
															<span class="svg-icon svg-icon-lg">
																<!--begin::Svg Icon | path:{{url('')}}/admin_assets/media/svg/icons/General/Search.svg-->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px"
                                                                         height="24px" viewBox="0 0 24 24"
                                                                         version="1.1">
																	<g stroke="none" stroke-width="1" fill="none"
                                                                       fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"></rect>
																		<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                              fill="#000000" fill-rule="nonzero"
                                                                              opacity="0.3"></path>
																		<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                              fill="#000000" fill-rule="nonzero"></path>
																	</g>
																</svg>
                                                                    <!--end::Svg Icon-->
															</span>
														</span>
                            </div>
                            <input type="text" class="form-control py-4 h-auto" placeholder="Email">
                        </div>
                        <!--end:Search-->
                        <!--begin:Users-->
                        <div class="mt-7 scroll scroll-pull ps ps--active-y scroll-y">
                            <!--begin:User-->
                            <div class="d-flex align-items-center justify-content-between mb-5"
                                 v-for="room in rooms" @click="showRoomMessages(room)">
                                <div class="d-flex align-items-center">
                                    <div class="symbol symbol-circle symbol-50 mr-3">
                                        <img alt="Pic" :src="room.user ? room.user.image : '{{url('')}}/admin_assets/media/users/300_12.jpg'">
                                    </div>
                                    <div class="d-flex flex-column">
                                        <a href="javascript:;"
                                           class="text-dark-75 text-hover-primary font-weight-bold font-size-lg"
                                           v-text="room.user ? room.user.name : ''"></a>
                                        <span class="text-muted font-weight-bold font-size-sm"
                                              v-text="room.data.last_message ? room.data.last_message.content : ''"></span>
                                    </div>
                                </div>
                                <div class="d-flex flex-column align-items-end">
                                    <span class="text-muted font-weight-bold font-size-sm"
                                          v-text="room.data.last_message ? convertTimeToHuman(room.data.last_message.time) : ''"
                                    ></span>
                                </div>
                            </div>
                            <!--end:User-->
                            <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                            </div>
                            <div class="ps__rail-y" style="top: 0px; height: 323px; right: -2px;">
                                <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 98px;"></div>
                            </div>
                        </div>
                        <!--end:Users-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card-->
            </div>
            <div class="offcanvas-mobile-overlay"></div>
            <!--end::Aside-->
            <chat-comp :doc_id="chat_info.doc_id" :shock_event="shock_event" :admin="admin" :first_time="first_time"
                       @change-first-time ="changeFirstTime"
            ></chat-comp>
        </div>
        <!--end::Chat-->
    </div>

@endsection

@push('js')
    {{--<script src="{{url('')}}/admin_assets/js/pages/custom/chat/chat.js?v=7.0.5"></script>--}}

    {{-- service --}}
    <script src="{{url('')}}/admin_assets/custom/js/chats/chat.js"></script>
    <script src="{{url('')}}/admin_assets/custom/js/chats/service.js"></script>

@endpush