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
