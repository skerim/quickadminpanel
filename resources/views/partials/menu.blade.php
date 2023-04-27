<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li>
            <select class="searchable-field form-control">

            </select>
        </li>
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('saport_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/supports*") ? "c-show" : "" }} {{ request()->is("admin/transports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.saport.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('support_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.supports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/supports") || request()->is("admin/supports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.support.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('transport_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.transports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/transports") || request()->is("admin/transports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.transport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('crane_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/cranes*") ? "c-show" : "" }} {{ request()->is("admin/producers*") ? "c-show" : "" }} {{ request()->is("admin/types*") ? "c-show" : "" }} {{ request()->is("admin/craneclasses*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-chess-bishop c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.craneManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('crane_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cranes.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cranes") || request()->is("admin/cranes/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chevron-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.crane.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('producer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.producers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/producers") || request()->is("admin/producers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-chevron-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.producer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/types") || request()->is("admin/types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-angle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.type.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('craneclass_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.craneclasses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/craneclasses") || request()->is("admin/craneclasses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-angle-right c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.craneclass.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('service_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/maintenances*") ? "c-show" : "" }} {{ request()->is("admin/servis*") ? "c-show" : "" }} {{ request()->is("admin/klimatyzacjas*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.serviceManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('maintenance_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.maintenances.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/maintenances") || request()->is("admin/maintenances/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.maintenance.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('servi_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.servis.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/servis") || request()->is("admin/servis/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-wrench c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.servi.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('klimatyzacja_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.klimatyzacjas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/klimatyzacjas") || request()->is("admin/klimatyzacjas/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-snowflake c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.klimatyzacja.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('liny_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.linies.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/linies") || request()->is("admin/linies/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bullseye c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.liny.title') }}
                </a>
            </li>
        @endcan
        @can('zawiesium_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.zawiesia.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/zawiesia") || request()->is("admin/zawiesia/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-anchor c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.zawiesium.title') }}
                </a>
            </li>
        @endcan
        @can('contract_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/customers*") ? "c-show" : "" }} {{ request()->is("admin/projects*") ? "c-show" : "" }} {{ request()->is("admin/rentals*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-money-bill-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.contractManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('customer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.customers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/customers") || request()->is("admin/customers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user-friends c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.customer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('project_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.projects.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/projects") || request()->is("admin/projects/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.project.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('rental_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.rentals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/rentals") || request()->is("admin/rentals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.rental.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('report_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/raports*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.reportManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('raport_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.raports.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/raports") || request()->is("admin/raports/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.raport.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('task_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/harmonograms*") ? "c-show" : "" }} {{ request()->is("admin/task-statuses*") ? "c-show" : "" }} {{ request()->is("admin/task-tags*") ? "c-show" : "" }} {{ request()->is("admin/tasks*") ? "c-show" : "" }} {{ request()->is("admin/tasks-calendars*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.taskManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('harmonogram_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.harmonograms.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/harmonograms") || request()->is("admin/harmonograms/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.harmonogram.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-statuses") || request()->is("admin/task-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_tag_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.task-tags.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/task-tags") || request()->is("admin/task-tags/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-server c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.taskTag.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('task_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks") || request()->is("admin/tasks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.task.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('tasks_calendar_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.tasks-calendars.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/tasks-calendars") || request()->is("admin/tasks-calendars/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-calendar c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.tasksCalendar.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

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
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
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