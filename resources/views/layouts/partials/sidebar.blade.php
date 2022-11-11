<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center text-uppercase text-bold">
        <span class="brand-text font-weight-light text-upercase">
            {{config('app.name','MASOMO')}}
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <x-nav-link class="nav-link" href="">
                    &#x1F4C8;
                    Dashboard
                </x-nav-link>
                <x-nav-patient/>
                <x-nav-link class="nav-link" href="{{ route('configuration') }}" :active="request()->routeIs('configuration')">
                    <i class="fab fa-cogs text-dark"></i>
                    Configuration
                </x-nav-link>

            </ul>
        </nav>
    </div>
</aside>
