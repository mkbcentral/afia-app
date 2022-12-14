  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formPatientPersonnel" tabindex="-1" role="dialog" aria-labelledby="formPatientPersonnelLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formPatientPersonnelLabel">{{$isEditable==false?'CREATION NOUVEAU PATIENT':
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
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de la fiche') }}" />
                            <x-input class="" type='text'
                                    placeholder="Numero" wire:model.defer='state.fiche_number'/>
                            @error('fiche_number') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    @endif
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
                            <x-label for="dateOfBirth" value="{{ __('Date de naissance') }}" />
                            <x-date-picker wire:model.defer='state.date_of_birth' id="dateOfBirth"/>
                            @error('date_of_birth') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de t??l??phone') }}" />
                            <x-input class="" type='text'
                                     placeholder="T??l" wire:model.defer='state.phone'/>
                            @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <x-label value="{{ __('Commune de residence') }}" />
                            <select id="my-select" class="form-control" wire:model.defer='state.commune'>
                                <option>Choisir...</option>
                                    @foreach ($communes as $commune)
                                        <option value="{{$commune->name}}">{{$commune->name}}</option>
                                 @endforeach
                            </select>
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
                            <label for="my-select">Service</label>
                            <select id="my-select" class="form-control" wire:model.defer='state.personnel_service_id'>
                                <option>Choisir...</option>
                                @foreach ($services as $services)
                                    <option value="{{$services->id}}">{{$services->name}}</option>
                                @endforeach
                            </select>
                            @error('personnel_service_id') <span class="error text-danger">{{ $message }}</span> @enderror
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
                    <x-button wire:click.prevent='update' type="submit" class="btn btn-info" >Mettre ?? jour</x-button>
                @endif
                <x-button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</x-button>
            </div>
        </form>
      </div>
    </div>
  </div>
