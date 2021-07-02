<div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
    <!--begin::Brand-->
    <div class="brand flex-column-auto" id="kt_brand" kt-hidden-height="65" style="">
        <!--begin::Logo-->
        <a href="index.html" class="brand-logo">
            <img alt="Logo" src="{{url('')}}/admin_assets/media/logos/logo-light.png">
        </a>
        <!--end::Logo-->
        <!--begin::Toggle-->
        <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
							<span class="svg-icon svg-icon svg-icon-xl">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Angle-double-left.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                     version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<polygon points="0 0 24 0 24 24 0 24"></polygon>
										<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z" fill="#000000" fill-rule="nonzero" transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999)"></path>
										<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999)"></path>
									</g>
								</svg>
                                <!--end::Svg Icon-->
							</span>
        </button>
        <!--end::Toolbar-->
    </div>    <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
        <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
             data-menu-dropdown-timeout="500">
            <ul class="menu-nav">
                <li class="menu-item {{$active_menu == "home" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-home"></i>
                        <span class="menu-text">{{trans('admin.home')}}</span>
                    </a>
                </li>

                @check_role('')
                <li class="menu-item {{$active_menu == "admins" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.admins.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-user-cog"></i>
                        <span class="menu-text">{{trans('admin.admins')}}</span>
                    </a>
                </li>

                <li class="menu-item {{$active_menu == "roles" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.roles.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-lock"></i>
                        <span class="menu-text">{{trans('admin.roles')}}</span>
                    </a>
                </li>
                @endcheck_role

                <li class="menu-item {{$active_menu == "categories" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.categories.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-list"></i>
                        <span class="menu-text">{{trans('admin.categories')}}</span>
                    </a>
                </li>

                @check_role('view_user|add_user|edit_user|delete_user')
                <li class="menu-item {{$active_menu == "users" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.users.index' , ['type' => 1])}}" class="menu-link">
                        <i class="menu-icon fas fa-user"></i>
                        <span class="menu-text">{{trans('admin.users')}}</span>
                    </a>
                </li>
                @endcheck_role

                @check_role('view_user|add_user|edit_user|delete_user')
                <li class="menu-item {{$active_menu == "employees" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.users.index' , ['type' => 2])}}" class="menu-link">
                        <i class="menu-icon fas fa-user"></i>
                        <span class="menu-text">{{trans('admin.employees')}}</span>
                    </a>
                </li>
                @endcheck_role


                {{--@check_role('view_notification|add_notification')--}}
                {{--<li class="menu-item {{$active_menu == "notifications" ? 'menu-item-active': ''}}" aria-haspopup="true">--}}
                    {{--<a href="{{route('admin.notifications.index')}}" class="menu-link">--}}
                        {{--<i class="menu-icon fas fa-bell"></i>--}}
                        {{--<span class="menu-text">{{trans('admin.notifications')}}</span>--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--@endcheck_role--}}

                @check_role('view_country|edit_country')
                <li class="menu-item {{$active_menu == "countries" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.countries.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-flag"></i>
                        <span class="menu-text">{{trans('admin.countries')}}</span>
                    </a>
                </li>
                @endcheck_role

                @check_role('view_city|add_city|edit_city|delete_city')
                <li class="menu-item {{$active_menu == "cities" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.cities.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-city"></i>
                        <span class="menu-text">{{trans('admin.cities')}}</span>
                    </a>
                </li>
                @endcheck_role

                @check_role('view_neighborhood|add_neighborhood|edit_neighborhood|delete_neighborhood')
                <li class="menu-item {{$active_menu == "neighborhoods" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.neighborhoods.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-city"></i>
                        <span class="menu-text">{{trans('admin.neighborhoods')}}</span>
                    </a>
                </li>
                @endcheck_role


                @check_role('view_gallery|add_gallery|edit_gallery|delete_gallery')
                <li class="menu-item {{$active_menu == "galleries" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.galleries.index')}}" class="menu-link">
                        <i class="menu-icon fas fa-images"></i>
                        <span class="menu-text">{{trans('admin.galleries')}}</span>
                    </a>
                </li>
                @endcheck_role

                @check_role('view_setting|edit_setting')
                <li class="menu-item {{$active_menu == "settings" ? 'menu-item-active': ''}}" aria-haspopup="true">
                    <a href="{{route('admin.settings.index')}}" class="menu-link">
                        <i class="menu-icon fa fa-cogs"></i>
                        <span class="menu-text">{{trans('admin.settings')}}</span>
                    </a>
                </li>
                @endcheck_role

            </ul>
        </div>
    </div>
</div>
