<li class="nav-item" >
    <a href="#" class="nav-link bg-secondary" >
        &#x1F5C3;
      <p>
        Facturation
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" >
        <x-nav-link  class="nav-link" href="{{ route('patient.prive') }}" :active="request()->routeIs('patient.prive')">
            <i class="fa fa-file" aria-hidden="true"></i> Privés
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('patient.abonne') }}" :active="request()->routeIs('patient.abonne')">
            <i class="fa fa-file" aria-hidden="true"></i> Abonnés
        </x-nav-link>
    </ul>
</li>
