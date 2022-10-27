<div wire:ignore.self>
    <div>
        <div class="d-flex justify-content-between">
            <h3>LISTE DES SERVICES</h3>
            <button class="btn btn-info btn-sm" type="button" wire:click.prevent='resetPRoperties'
                data-toggle="modal" data-target="#formService">Créer...</button>
        </div>

        <table class="table table-striped table-sm mt-4">
            <thead class="thead-light">
                <tr>
                    <th class="text-center">#</th>
                    <th>SERVICE</th>
                    <th class="text-center">PATIENTS</th>
                    <th  class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($services as $index => $service)
                    <tr>
                        <td  class="text-center">{{$index+1}}</td>
                        <td>{{$service->name}}</td>
                        <td class="text-center">{{$service->patients->count()}}</td>
                        <td  class="text-center">
                            <button wire:click.prevent='edit({{$service}})' data-toggle="modal" data-target="#formService"
                                wire:click.prevent='' class="btn btn-link btn-sm"
                                type="button"><i class="fas fa-edit    "></i>
                            </button>
                            <button wire:click.prevent='delete({{$service}})' class="btn btn-link btn-sm" type="button">
                                <i class="fas fa-trash text-danger"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('livewire.admin.modals.form-service')
</div>
