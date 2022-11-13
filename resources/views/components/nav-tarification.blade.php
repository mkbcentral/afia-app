<li class="nav-item" >
    <a href="#" class="nav-link bg-success" >
        <i class="fas fa-file-alt"></i>
      <p>
        Tarification
        <i class="fas fa-angle-left right"></i>
      </p>
    </a>
    <ul class="nav nav-treeview" >
        <x-nav-link  class="nav-link" href="{{ route('tarification.consultation') }}" :active="request()->routeIs('tarification.consultation')">
            <i class="fas fa-arrow-right"></i> Consultation
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.labo') }}" :active="request()->routeIs('tarification.labo')">
            <i class="fas fa-arrow-right"></i> Laboratoire
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.radio') }}" :active="request()->routeIs('tarification.radio')">
            <i class="fas fa-arrow-right"></i>  Radiologie
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.echo') }}" :active="request()->routeIs('tarification.echo')">
            <i class="fas fa-arrow-right"></i> Echographie
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.acte') }}" :active="request()->routeIs('tarification.acte')">
            <i class="fas fa-arrow-right"></i> Acte
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.sejour') }}" :active="request()->routeIs('tarification.sejour')">
            <i class="fas fa-arrow-right"></i> Sejour
        </x-nav-link>
        <x-nav-link  class="nav-link" href="{{ route('tarification.autre') }}" :active="request()->routeIs('tarification.autre')">
            <i class="fas fa-arrow-right"></i> Autres
        </x-nav-link>

    </ul>
</li>
