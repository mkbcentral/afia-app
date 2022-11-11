<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <div class="text-center">
                        <img src="{{ asset('logo.png') }}" alt="" width="60px">
                        <h1 class="m-0  text-primary text-uppercase">  Tarification de la consultation</h1>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
                <div class="d-flex justify-content-center">
                    <div class="w-75">
                        <div class="d-flex justify-content-between">
                            <h4><i class="fas fa-list"></i> {{$isTrashed==false?'LISTE DES CONSULTATIONS':'LISTE DES CONSULTATIONS DANS LA CORBEILLE';}}</h4>
                            <button class="btn btn-info btn-sm" type="button" wire:click.prevent="resetPropreties"
                                data-toggle="modal" data-target="#formTarification">
                                <i class="fas fa-plus-circle"></i> Nouveau
                            </button>
                        </div>
                        <div class=" mt-4">
                            <div class="d-flex justify-content-between">
                                <div class="w-25 ">
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm">
                                          <input wire:model.debounce.500ms='keySearch' type="text" class="form-control"
                                            placeholder="Recheche ici...">
                                          <div class="input-group-append">
                                            <div class="btn btn-primary">
                                              <i class="fas fa-search"></i>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </div>
                                <div>
                                    <button class="btn btn-link btn-sm" wire:click.prevent='refreshDate' type="button">
                                        <i class="fas fa-sync-alt"></i> Actualiser
                                    </button>
                                   @if ($isTrashed==false)
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-link btn-sm dropdown-toggle"
                                                data-toggle="dropdown" aria-expanded="false">
                                            <i class="fas fa-print text-secondary"></i> Imprimer
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#">Privé</a></li>
                                            <li><a class="dropdown-item" href="#">Abonnées</a></li>
                                            <li><a class="dropdown-item" href="#">All</a></li>
                                        </ul>
                                    </div>
                                   @endif
                                    <button class="btn btn-link btn-sm" type="button" wire:click.prevent='getTrashed'>
                                        <i class="fas fa-trash-restore-alt"></i> Ma corbeill
                                    </button>

                                </div>
                            </div>
                            @if ($labos->isEmpty())
                            <div class="text-center mt-4 p-4 ">
                                <h3 class="text-success"><i class="fa fa-database" aria-hidden="true"></i> Aucune donnée trouvée</h3>
                            </div>
                            @else
                            <table class="table table-striped table-sm">
                                <thead class="thead-light">
                                    <tr>
                                        <th>#</th>
                                        <th>NAME OU ABREVIATION</th>
                                        <th class="text-center">PRIX PRIVE USD</th>
                                        <th class="text-center">PRIX ABONNE USD</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($labos as $index => $labo)
                                        <tr>
                                            <td>{{$index+1}}</td>
                                            <td>{{$labo->abreviation=="Aucune"?$labo->name:$labo->abreviation}}</td>
                                            <td class="text-center">{{$labo->price_prive}}</td>
                                            <td class="text-center">{{$labo->price_abonne}}</td>
                                            <td class="text-center">
                                                <button data-toggle="modal" data-target="#formTarification"
                                                    wire:click.prevent='edit({{$labo}})' class="btn btn-link btn-sm"
                                                    type="button"><i class="fas fa-edit    "></i>
                                                </button>
                                                <button wire:click.prevent='showDeleteDialog({{$labo}})'
                                                    class="btn btn-link btn-sm" type="button">
                                                    <i class="fas fa-trash text-danger"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            @endif
                        </div>

                    </div>

                </div>
        </div>
    </div>
    @include('livewire.tarification.modals.form-tarification')
</div>
