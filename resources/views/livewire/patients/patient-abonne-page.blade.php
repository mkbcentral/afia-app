<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <div class="text-center">
                        <img src="{{ asset('logo.png') }}" alt="" width="60px">
                        <h1 class="m-0  text-primary text-uppercase">  Liste des patients abonnés</h1>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <H3 class="text-info">Total: {{$patients->count()}} patients</H3>
                <button class="btn btn-primary" type="button" wire:click.prevent="resetPropreties"
                    data-toggle="modal" data-target="#formPatientAbonne">Nouveau</button>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="w-25 p-3">
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
            @if ($patients->isEmpty())
                <div class="text-center mt-4 p-4">
                    <h3 class="text-success"><i class="fa fa-database" aria-hidden="true"></i> Aucun patient trouvé</h3>
                </div>
            @else
                <table class="table table-striped table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>N° FICHE</th>
                            <th>NOM COMPLET</th>
                            <th class="text-center">GENRE</th>
                            <th class="text-center">AGE</th>
                            <th class="text-center">SOCIETE</th>
                            <th class="text-center">TYPE</th>
                            <th class="text-center">TELEPHONE</th>
                            <th class="text-center">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($patients as $index => $patient)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$patient->fiche->numero}}</td>
                                <td>{{$patient->name}}</td>
                                <td class="text-center">{{$patient->gender}}</td>
                                <td class="text-center">0</td>
                                <td class="text-center">{{$patient->abonnement->name.'/'.$patient->matricule}}</td>
                                <td class="text-center">{{$patient->type}}</td>
                                <td class="text-center">{{$patient->phone}}</td>
                                <td class="text-center">
                                    <button data-toggle="modal" data-target="#formPatientAbonne"
                                        wire:click.prevent='edit({{$patient}})' class="btn btn-link btn-sm"
                                        type="button"><i class="fas fa-edit    "></i>
                                    </button>
                                    <button wire:click.prevent='showDeleteDialog({{$patient}})'
                                        class="btn btn-link btn-sm" type="button">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                    <button
                                        data-toggle="modal" data-target="#formEditFicheNumber"
                                        wire:click.prevent='edit({{$patient}})'
                                        class="btn btn-link btn-sm" type="button">
                                        <i class="fas fa-cogs text-dark"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between p-4 mt-4">
                    <div>{{$patients->links('livewire::bootstrap')}}</div>
                    <div>
                        <div class="form-group">
                            <label for="my-select">Nombre par page</label>
                            <select id="my-select" class="form-control" wire:model="pageNumber">
                                @for ($i = 10; $i <= 100; $i+=10)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    @include('livewire.patients.modals.form-patient-abonne')
    @include('livewire.patients.modals.form-edit-fiche-number')
</div>
