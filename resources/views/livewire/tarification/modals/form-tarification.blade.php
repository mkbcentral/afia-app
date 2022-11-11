<div wire:ignore.self id="formTarification"class="modal fade" tabindex="-1" role="dialog" aria-labelledby="formTarificationTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formTarificationTitle">
                    {{$isEditable==false?'CREAION':'MISE A JOUR'}}
                </h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form   @if ($isEditable==false)
                        wire:submit.prevent='store'
                    @else
                        wire:submit.prevent='update'
                    @endif>
                <div class="modal-body">
                    <div class="form-group">
                        <x-label value="{{ __('Nom') }}" />
                        <x-input class="" type='text'
                                 placeholder="Nom" wire:model.defer='state.name'/>
                        @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <x-label value="{{ __('Abreviation') }}" />
                        <x-input class="" type='text'
                                 placeholder="Abreviation" wire:model.defer='state.abreviation'/>
                        @error('abreviation') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <x-label value="{{ __('Prix privé') }}" />
                        <x-input class="" type='text'
                                 placeholder="00 USD" wire:model.defer='state.price_prive'/>
                        @error('price_prive') <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <x-label value="{{ __('Prix abonné') }}" />
                        <x-input class="" type='text'
                                 placeholder="00 USD" wire:model.defer='state.price_abonne'/>
                        @error('price_abonne') <span class="error text-danger">{{ $message }}</span> @enderror
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
