<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('marketplace_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/orders*") ? "c-show" : "" }} {{ request()->is("admin/apartments*") ? "c-show" : "" }} {{ request()->is("admin/complexes*") ? "c-show" : "" }} {{ request()->is("admin/reviews*") ? "c-show" : "" }} {{ request()->is("admin/infrastructures*") ? "c-show" : "" }} {{ request()->is("admin/metros*") ? "c-show" : "" }} {{ request()->is("admin/types*") ? "c-show" : "" }} {{ request()->is("admin/statuses*") ? "c-show" : "" }} {{ request()->is("admin/finishings*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.marketplace.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('order_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                                <i class="fa-fw fab fa-first-order c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.order.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('apartment_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.apartments.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/apartments") || request()->is("admin/apartments/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-home c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.apartment.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('complex_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.complexes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/complexes") || request()->is("admin/complexes/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-building c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.complex.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('review_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.reviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/reviews") || request()->is("admin/reviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.review.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('infrastructure_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.infrastructures.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/infrastructures") || request()->is("admin/infrastructures/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.infrastructure.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('metro_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.metros.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/metros") || request()->is("admin/metros/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bus-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.metro.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/types") || request()->is("admin/types/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-keyboard c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.type.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-bookmark c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.status.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('finishing_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.finishings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/finishings") || request()->is("admin/finishings/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-clipboard-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.finishing.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users-cog c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.settings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/settings") || request()->is("admin/settings/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>