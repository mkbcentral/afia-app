  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formPatientPrive" tabindex="-1" role="dialog" aria-labelledby="formPatientPriveLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formPatientPriveLabel">{{$isEditable==false?'CREATION NOUVEAU PATIENT':
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
                @if ($isEditable==false)
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <x-label value="{{ __('Numero de la fiche') }}" />
                                <x-input class="" type='text'
                                        placeholder="Numero" wire:model.defer='state.fiche_number'/>
                                @error('fiche_number') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>
                @endif
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de residence') }}" />
                            <x-input class="" type='text'
                                     placeholder="Numero" wire:model.defer='state.numero'/>
                            @error('numero') <span class="error text-danger">{{ $message }}</span> @enderror
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
