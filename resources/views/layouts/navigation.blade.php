<div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-menu-trigger"><a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none"
                data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a><a href="#"
                class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em
                    class="icon ni ni-menu"></em></a></div>
        <div class="nk-sidebar-brand"><a href="{{ route('admin.dashboard') }}" class="logo-link nk-sidebar-logo"><img
                    class="logo-light logo-img" src="images/logo.png" srcset="{{ asset('/demo1/images/logo2x.png') }} 2x"
                    alt="logo"><img class="logo-dark logo-img" src="{{ asset('images/logo-dark.png') }}"
                    srcset="{{ asset('/demo1/images/logo-dark2x.png') }} 2x" alt="logo-dark"></a></div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="nk-menu-heading">
                        <h6 class="overline-title text-primary-alt">Use-Case Preview</h6>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.dashboard') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Dashboard</span></a></li>
                    <li class="nk-menu-item"><a href="{{ route('users.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">users Management</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.devices.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Device Management</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.devices.pickup.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Device Pickup Management</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.transfers.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Device Transfer Management</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.partners.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Company Management</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.payments.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Payments</span></a>
                    </li>
                    <li class="nk-menu-item"><a href="{{ route('admin.reports.index') }}" class="nk-menu-link"><span
                                class="nk-menu-text">Reports</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

