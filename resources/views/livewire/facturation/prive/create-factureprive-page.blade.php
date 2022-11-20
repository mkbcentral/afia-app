<div>
    <div class="content-header">
        <div class="container-fluid">
           <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <img src="{{ asset('logo.png') }}" alt="" width="60px">
                                <h1 class="m-0  text-primary text-uppercase"> CREATE NOUVELLE FACTURE PRIVE</h1>
                            </div>
                            <div class="mt-4">
                                <div><span class="text-bold">Nom: </span>{{$factureData->patient->name}}</div>
                                <div><span class="text-bold">Genre: </span>{{$factureData->patient->gender}}</div>
                                <div><span class="text-bold">Age: </span>{{$factureData->patient->getAge($factureData->patient->date_of_birth)}}</div>
                                <div><span class="text-bold">Etat: </span>{{$factureData->patient->is_interneted==false?'Ambulant':'Hospitalisé'}}</div>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
           <div class="card">
                <div class="card-body text-center">
                    <h4>Choisir ici</h4>
                    <button data-toggle="modal" data-target="#formLaboFacture" class="btn btn-primary">Laboratoire</button>
                    <button class="btn btn-danger">Radoilogie</button>
                    <button class="btn btn-secondary">Echographie</button>
                    <button class="btn btn-warning">Sejour</button>
                    <button class="btn btn-success">Actes</button>
                    <button class="btn btn-info">Autres</button>
                    <button class="btn btn-dark">Medication</button>
                </div>
           </div>
        </div>
    </div>

    @include('livewire.facturation.modals.form-labo-facture')
</div>
