  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formEditFicheNumber" tabindex="-1" role="dialog" aria-labelledby="formEditFicheNumberLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formEditFicheNumberLabel">MISE A JOUR NUMERO FICHE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form wire:submit.prevent='updateFicheNumber'>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <x-label value="{{ __('Numero de la fiche') }}" />
                            <x-input class="" type='text'
                                    placeholder="Numero" wire:model.defer='fiche_number_to_edit'/>
                            @error('fiche_number_to_edit') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <x-button type="submit" class="btn btn-primary">Mettre à jour</x-button>
                <x-button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</x-button>
            </div>
        </form>
      </div>
    </div>
  </div>
