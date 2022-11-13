
<div>
    <div class="card w-50">
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <x-date-picker wire:model.defer='state.date' id="doDate"/>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group" >
                            <x-time-picker wire:model.defer='state.time' id="doTime"/>
                        </div>
                    </div>
                    <div>
                        <button class="btn btn-primary" wire:click.prevent='test' type="button">Test</button>
                    </div>
                </div>
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Code</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($actions as $index => $action)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>Code {{$index+1}}</td>
                                <td>{{$action->date}}</td>
                                <td>{{$action->time}}</td>
                                <td>
                                    <button class="btn btn-primary" wire:click.prevent="edit({{$action}})" type="button">Edit</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
