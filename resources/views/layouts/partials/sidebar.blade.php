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
                <li class="nav-item" >
                    <a href="#" class="nav-link bg-secondary" >
                        &#x1F5C3;
                      <p>
                        Gestionnaire fiches
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <x-nav-link  class="nav-link" href="{{ route('patient.prive') }}" :active="request()->routeIs('patient.prive')">
                            <i class="fas fa-user-shield"></i> Privés
                        </x-nav-link>
                        <x-nav-link  class="nav-link" href="{{ route('patient.abonne') }}" :active="request()->routeIs('patient.abonne')">
                            <i class="fas fa-user-tag"></i> Abonnés
                        </x-nav-link>
                        <x-nav-link  class="nav-link" href="{{ route('patient.personnel') }}" :active="request()->routeIs('patient.personnel')">
                            <i class="fas fa-users"></i> Personnls
                        </x-nav-link>
                    </ul>
                </li>
                <x-nav-link class="nav-link" href="{{ route('configuration') }}" :active="request()->routeIs('configuration')">
                    <i class="fab fa-cogs text-dark"></i>
                    Configuration
                </x-nav-link>

            </ul>
        </nav>
    </div>
</aside>
