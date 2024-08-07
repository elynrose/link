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
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/domains*") ? "c-show" : "" }} {{ request()->is("admin/templates*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
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
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('domain_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.domains.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/domains") || request()->is("admin/domains/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.domain.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('template_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.templates.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/templates") || request()->is("admin/templates/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.template.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('link_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.links.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/links") || request()->is("admin/links/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-link c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.link.title') }}
                </a>
            </li>
        @endcan
        @can('qr_code_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.qr-codes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/qr-codes") || request()->is("admin/qr-codes/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-qrcode c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.qrCode.title') }}
                </a>
            </li>
        @endcan
        @can('page_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-file-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.page.title') }}
                </a>
            </li>
        @endcan
        @can('social_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.socials.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/socials") || request()->is("admin/socials/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-futbol c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.social.title') }}
                </a>
            </li>
        @endcan
        @can('click_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.clicks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clicks") || request()->is("admin/clicks/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-mouse-pointer c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.click.title') }}
                </a>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
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