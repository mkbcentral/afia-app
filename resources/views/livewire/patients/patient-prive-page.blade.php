<div>
    <div>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-10">
                        <div class="text-center">
                            <img src="{{ asset('logo.png') }}" alt="" width="60px">
                            <h1 class="m-0  text-primary text-uppercase">  Liste des patients privés</h1>
                        </div>

                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="button"
                        data-toggle="modal" data-target="#formPatientPrive">Nouveau</button>
                </div>
            </div>
        </div>
    </div>
    @include('livewire.patients.modals.form-patient-prive')
</div>
