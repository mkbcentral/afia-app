<div wire:ignore.self>
    <div>
        <div class="d-flex justify-content-between">
            <h3>LISTE DES TYPES DU PATIENT</h3>
            <button class="btn btn-info btn-sm" type="button" wire:click.prevent='resetPRoperties'
                data-toggle="modal" data-target="#formType">Créer...</button>
        </div>

        @if ($types->isEmpty())
            <div class="text-center mt-4 p-4">
                <h3 class="text-success"><i class="fa fa-database" aria-hidden="true"></i> Aucune donnée trouvée</h3>
            </div>
        @else
            <table class="table table-striped table-sm mt-4">
                <thead class="thead-light">
                    <tr>
                        <th class="text-center">#</th>
                        <th>TYPE</th>
                        <th  class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($types as $index => $type)
                        <tr>
                            <td  class="text-center">{{$index+1}}</td>
                            <td>{{$type->name}}</td>
                            <td  class="text-center">
                                <button wire:click.prevent='edit({{$type}})' data-toggle="modal" data-target="#formType"
                                    wire:click.prevent='' class="btn btn-link btn-sm"
                                    type="button"><i class="fas fa-edit    "></i>
                                </button>
                                <button wire:click.prevent='delete({{$type}})' class="btn btn-link btn-sm" type="button">
                                    <i class="fas fa-trash text-danger"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
    @include('livewire.admin.modals.form-type')
</div>
