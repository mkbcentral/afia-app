<div wire:ignore.self>
    <div>
        <div class="d-flex justify-content-between">
            <h3>LISTE DES ABONNEMENTS</h3>
            <button class="btn btn-info btn-sm" type="button" wire:click.prevent='resetPRoperties'
                data-toggle="modal" data-target="#formAbonnemnt">Créer...</button>
        </div>

        <table class="table table-striped table-sm mt-4">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th>ABONNEMENT</th>
                    <th class="text-center">PATIENTS</th>
                    <th  class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($abonnements as $index => $abonnement)
                    <tr>
                        <td  class="text-center">{{$index+1}}</td>
                        <td>{{$abonnement->name}}</td>
                        <td class="text-center">{{$abonnement->patients->count()}}</td>
                        <td  class="text-center">
                            <button wire:click.prevent='edit({{$abonnement}})' data-toggle="modal" data-target="#formAbonnemnt"
                                wire:click.prevent='' class="btn btn-link btn-sm"
                                type="button"><i class="fas fa-edit    "></i>
                            </button>
                            <button wire:click.prevent='delete({{$abonnement}})' class="btn btn-link btn-sm" type="button">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('livewire.admin.modals.form-abonnement')
</div>
