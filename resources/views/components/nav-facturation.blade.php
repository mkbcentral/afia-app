<li class="nav-item" >
    <a href="#" class="nav-link bg-secondary" >
        &#x1F5C3;
      <p>
        Facturation
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" >
        <x-nav-link  class="nav-link" href="{{ route('facturation.prive') }}" :active="request()->routeIs('facturation.prive')">
            <i class="fa fa-file" aria-hidden="true"></i> Privés
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('facturation.abonne') }}" :active="request()->routeIs('facturation.abonne')">
            <i class="fa fa-file" aria-hidden="true"></i> Abonnés
        </x-nav-link>
    </ul>
</li>
