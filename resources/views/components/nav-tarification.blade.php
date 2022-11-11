<li class="nav-item" >
    <a href="#" class="nav-link bg-secondary" >
        &#x1F5C3;
      <p>
        Tarification
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" >
        <x-nav-link  class="nav-link" href="{{ route('tarification.labo') }}" :active="request()->routeIs('tarification.labo')">
             Laboratoire
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.radio') }}" :active="request()->routeIs('tarification.radio')">
             Radiologie
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.echo') }}" :active="request()->routeIs('tarification.labo')">
             Echographie
        </x-nav-link>
    </ul>
</li>
