<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="#" class="brand-link text-center text-uppercase text-bold">
        <span class="brand-text font-weight-light text-upercase">
            {{config('app.name','MASOMO')}}
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <x-nav-link class="nav-link" href="">
                        &#x1F4C8;
                        Dashboard
                    </x-nav-link>
                </li>
                <li class="nav-item" >
                    <a href="#" class="nav-link bg-secondary" >
                        &#x1F5C3;
                      <p>
                        Gestionnaire fiches
                        <i class="fas fa-angle-left right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview" >
                        <x-nav-link  class="nav-link" href="">
                            <i class="fas fa-user-shield"></i> Privés
                        </x-nav-link>
                        <x-nav-link  class="nav-link" href="">
                            <i class="fas fa-user-tag"></i> Abonné
                        </x-nav-link>
                        <x-nav-link  class="nav-link" href="">
                            <i class="fas fa-users"></i> Personnls
                        </x-nav-link>
                    </ul>
                </li>

            </ul>
        </nav>
    </div>
</aside>
