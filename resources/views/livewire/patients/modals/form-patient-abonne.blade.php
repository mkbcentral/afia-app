  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formPatientAbonne" tabindex="-1" role="dialog" aria-labelledby="formPatientAbonneLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formPatientAbonneLabel">{{$isEditable==false?'CREATION NOUVEAU PATIENT':
            'MISE A JOUR PATIENT'}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form
            @if ($isEditable==false)
                wire:submit.prevent='store'
            @else
                wire:submit.prevent='update'
            @endif
            >
            <div class="modal-body">
                <div class="row">
                    @if ($isEditable==false)
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de la fiche') }}" />
                            <x-input class="" type='text'
                                    placeholder="Numero" wire:model.defer='state.fiche_number'/>
                            @error('fiche_number') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
                    <div class="{{$isEditable==false?'col-md-6':'col-md-12'}}">
                        <div class="form-group">
                            <x-label value="{{ __('Numero matricule') }}" />
                            <x-input class="" type='text'
                                    placeholder="Matricule" wire:model.defer='state.matricule'/>
                            @error('matricule') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Nom complet') }}" />
                            <x-input class="" type="text"
                                     placeholder="Nom du patient" wire:model.defer='state.name'/>
                            @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="my-select">Sexe</label>
                            <select id="my-select" class="form-control" wire:model.defer='state.gender'>
                                <option>Choisir...</option>
                                <option value="M">M</option>
                                <option value="F">F</option>
                            </select>
                            @error('gender') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Date de naissance') }}" />
                            <x-input class="" type='date'
                                     placeholder="Date de naissance" wire:model.defer='state.date_of_birth'/>
                            @error('date_of_birth') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de téléphone') }}" />
                            <x-input class="" type='text'
                                     placeholder="Tél" wire:model.defer='state.phone'/>
                            @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Commune de residence') }}" />
                            <x-input class=""
                                     placeholder="Commune" wire:model.defer='state.commune'/>
                            @error('commune') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Quartier de residence') }}" />
                            <x-input class=""
                                     placeholder="Quartier" wire:model.defer='state.quartier'/>
                            @error('quartier') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Avenue de residence') }}" />
                            <x-input class="" type='text'
                                     placeholder="Avenu" wire:model.defer='state.avenue'/>
                            @error('avenue') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de residence') }}" />
                            <x-input class="" type='text'
                                     placeholder="Numero" wire:model.defer='state.numero'/>
                            @error('numero') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="my-select">Société</label>
                            <select id="my-select" class="form-control" wire:model.defer='state.abonnement_id'>
                                <option>Choisir...</option>
                                @foreach ($abonnements as $abonnement)
                                    <option value="{{$abonnement->id}}">{{$abonnement->name}}</option>
                                @endforeach
                            </select>
                            @error('abonnement_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="my-select">Type patient</label>
                            <select id="my-select" class="form-control" wire:model.defer='state.type'>
                                <option>Choisir...</option>
                                @foreach ($typePatients as $typePatient)
                                    <option value="{{$typePatient->name}}">{{$typePatient->name}}</option>
                                @endforeach
                            </select>
                            @error('type') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
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
