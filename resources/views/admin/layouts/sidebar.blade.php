<div class="navbar-bg"></div>
<!-- Navbar Start -->
@include('admin.layouts.navbar')
<!-- Navbar End -->

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ setSidebarActive(['admin.dashboard']) }}">
                <a class="nav-link" href="{{ route('admin.dashboard') }}"><i
                        class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Starter</li>

            <li class="{{ setSidebarActive(['admin.category.*']) }}"><a class="nav-link"
                    href="{{ route('admin.category.index') }}"><i class="fas fa-list"></i>
                    <span>Categories</span></a></li>



            <li class="dropdown {{ setSidebarActive(['admin.news.*', 'admin.pending.news']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-newspaper"></i>
                    <span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.news.*']) }}"><a class="nav-link"
                            href="{{ route('admin.news.index') }}">All News</a></li>

                    <li class="{{ setSidebarActive(['admin.pending.news']) }}"><a class="nav-link"
                            href="{{ route('admin.pending.news') }}">Pending News</a></li>

                </ul>
            </li>

            <li class="dropdown {{ setSidebarActive(['admin.about.*', 'admin.contact.*']) }}">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.about.*']) }}"><a class="nav-link"
                            href="{{ route('admin.about.index') }}">About Page</a></li>
                    <li class="{{ setSidebarActive(['admin.contact.*']) }}"><a class="nav-link"
                            href="{{ route('admin.contact.index') }}">Contact Page</a></li>
                </ul>
            </li>

            <li class="{{ setSidebarActive(['admin.social-count.*']) }}"><a class="nav-link"
                    href="{{ route('admin.social-count.index') }}"><i class="fas fa-hashtag"></i>
                    <span>Social Count</span></a></li>

            <li class="{{ setSidebarActive(['admin.contact-message.*']) }}"><a class="nav-link"
                    href="{{ route('admin.contact-message.index') }}"><i class="fas fa-id-card-alt"></i>
                    <span>Contact Messages </span>

                </a></li>

            <li class="{{ setSidebarActive(['admin.home-section-setting.*']) }}"><a class="nav-link"
                    href="{{ route('admin.home-section-setting.index') }}"><i class="fas fa-wrench"></i>
                    <span>Home Section Setting</span></a></li>



            <li class="{{ setSidebarActive(['admin.advertisement.*']) }}"><a class="nav-link"
                    href="{{ route('admin.advertisement.index') }}"><i class="fas fa-ad"></i>
                    <span>Advertisement</span></a></li>




            <li class="{{ setSidebarActive(['admin.subscribers.*']) }}"><a class="nav-link"
                    href="{{ route('admin.subscribers.index') }}"><i class="fas fa-users"></i>
                    <span>Subscribers</span></a></li>



            <li
                class="dropdown
                {{ setSidebarActive([
                    'admin.social-link.*',
                    'admin.footer-info.*',
                    'admin.footer-grid-one.*',
                    'admin.footer-grid-three.*',
                    'admin.footer-grid-two.*',
                ]) }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i>
                    <span>Footer Setting</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.social-link.*']) }}"><a class="nav-link"
                            href="{{ route('admin.social-link.index') }}">Social Links</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-info.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-info.index') }}">Footer Info</a></li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-one.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-one.index') }}">Footer Grid One</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-two.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-two.index') }}">Footer Grid Two</a>
                    </li>
                    <li class="{{ setSidebarActive(['admin.footer-grid-three.*']) }}"><a class="nav-link"
                            href="{{ route('admin.footer-grid-three.index') }}">Footer Grid Three</a>
                    </li>

                </ul>
            </li>


            {{-- @if (canAccess(['access management index']))
                <li class="dropdown
                {{ setSidebarActive([
                    'admin.role.*',
                    'admin.role-users.*'
                    ]) }}
            ">
                    <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-shield"></i>
                        <span>{{ __('admin.Access Management') }}</span></a>
                    <ul class="dropdown-menu">

                        <li class="{{ setSidebarActive(['admin.role-users.*']) }}"><a class="nav-link"
                                href="{{ route('admin.role-users.index') }}">{{ __('admin.Role Users') }}</a></li>

                        <li class="{{ setSidebarActive(['admin.role.*']) }}"><a class="nav-link"
                                href="{{ route('admin.role.index') }}">{{ __('admin.Roles and Permissions') }}</a></li>
                    </ul>
                </li>
            @endif --}}


            <li class="{{ setSidebarActive(['admin.setting.*']) }}"><a class="nav-link"
                    href="{{ route('admin.setting.index') }}"><i class="fas fa-cog"></i>
                    <span>Settings</span></a></li>


            {{--   @if (canAccess(['languages index']))

            <li class="dropdown
                {{ setSidebarActive([
                    'admin.frontend-localization.index',
                    'admin.admin-localization.index',
                    'admin.language.*'
                ]) }}
            ">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-language"></i>
                    <span>{{ __('admin.Localization') }}</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ setSidebarActive(['admin.language.*']) }}"><a class="nav-link"
                        href="{{ route('admin.language.index') }}">
                        <span>{{ __('admin.Languages') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.frontend-localization.index']) }}"><a class="nav-link"
                        href="{{ route('admin.frontend-localization.index') }}">
                        <span>{{ __('admin.Frontend Lang') }}</span></a></li>

                    <li class="{{ setSidebarActive(['admin.admin-localization.index']) }}"><a class="nav-link"
                        href="{{ route('admin.admin-localization.index') }}">
                        <span>{{ __('admin.Admin Lang') }}</span></a></li>
                </ul>
            </li>
            @endif --}}

            {{-- <li><a class="nav-link" href="blank.html"><i class="far fa-square"></i> <span>Blank Page</span></a></li> --}}

            {{-- <li class="dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Forms</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="forms-advanced-form.html">Advanced Form</a></li>
                    <li><a class="nav-link" href="forms-editor.html">Editor</a></li>
                    <li><a class="nav-link" href="forms-validation.html">Validation</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>
