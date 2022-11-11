<div>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <div class="text-center">
                        <img src="{{ asset('logo.png') }}" alt="" width="60px">
                        <h1 class="m-0  text-primary text-uppercase">  Tarification laboratoire</h1>
                    </div>

                </div>
            </div>
            <div class="d-flex justify-content-between">
                <H3 class="text-info">Total: 0</H3>
                <button class="btn btn-primary" type="button" wire:click.prevent="resetPropreties"
                    data-toggle="modal" data-target="#formPatientPrive">Nouveau</button>

            </div>

        </div>
    </div>
    <div class="card">
        <div class="card-body">

        </div>
    </div>

</div>
