<div wire:ignore.self id="formDemande"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formDemandeTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <form wire:submit.prevent='createNewFacture'>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center text-primary"><strong><i class="fas fa-user-clock"></i> DEMANDE DE CONSULTATION</strong></h4>
                        </div>
                    </div>
                    @if ($patientToAdd != null)
                        <div class="card-body">
                                <div class="text-primary"><strong>N° Fiche: </strong>{{$patientToAdd->fiche->numero}}</div>
                                <div><strong>Noms: </strong>{{$patientToAdd->name}}</div>
                                <div><strong>Sexe: </strong>{{$patientToAdd->gender}}</div>
                                <div><strong>Age: </strong>{{$patientToAdd->getAge($patientToAdd->date_of_birth)}}</div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="my-select">Type de consulatation</label>
                        <select id="my-select" class="form-control" wire:model.defer='consultation_id'>
                            <option>Choisir...</option>
                            @foreach ($consultations as $consultation)
                                <option value="{{$consultation->id}}">{{$consultation->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    @if ($isEditable==false)
                        <x-button type="submit" class="btn btn-primary">Sauvegarder</x-button>
                    @else
                        <x-button wire:click.prevent='update' type="submit" class="btn btn-info" >Mettre à jour</x-button>
                    @endif
                    <x-button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</x-button>
                </div>
            </form>

        </div>
    </div>
</div>
