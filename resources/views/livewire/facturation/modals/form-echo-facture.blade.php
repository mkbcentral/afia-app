  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="formEchoFacture" tabindex="-1" role="dialog" aria-labelledby="formEchoFactureLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="formEchoFactureLabel">EXAMEN ECHOGRAPHIE</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                @foreach ($echos as $echo)
                    <div class="col-sm-3">
                        <div class="form-check">
                            <input wire:model.defer='itemsEcho' type="checkbox" class="form-check-input"
                                id="{{$echo->id}}" value="{{$echo->id}}">
                            <label class="form-check-label" for="{{$echo->id}}">{{$echo->name}}</label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="modal-footer">
            <x-button  type="button" wire:click.prevent='saveEchos' class="btn btn-primary">Sauvegarder</x-button>
            <x-button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</x-button>
        </div>
      </div>
    </div>
  </div>
