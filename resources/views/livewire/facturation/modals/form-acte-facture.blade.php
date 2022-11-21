  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formActeFacture" tabindex="-1" role="dialog" aria-labelledby="formActeFactureLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formActeFactureLabel">ACTES MEDICALES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($actes as $acte)
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input wire:model.defer='itemsActe' type="checkbox" class="form-check-input"
                                id="{{$acte->id}}" value="{{$acte->id}}">
                            <label class="form-check-label" for="{{$acte->id}}">{{$acte->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <x-button  type="button" wire:click.prevent='saveActes' class="btn btn-primary">Sauvegarder</x-button>
            <x-button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</x-button>
        </div>
      </div>
    </div>
  </div>
