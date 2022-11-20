<div>
    <div class="content-header">
        <div class="container-fluid">
           <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <img src="{{ asset('logo.png') }}" alt="" width="60px">
                                <h1 class="m-0  text-primary text-uppercase"> LISTE DES FACTURE PRIVES</h1>
                            </div>

                            @if ($factures->isEmpty())
                                <div class="text-center mt-4 p-4 ">
                                    <h3 class="text-success"><i class="fa fa-database" aria-hidden="true"></i> Aucune donnée trouvée</h3>
                                </div>
                            @else
                                <div class="mt-4 w-100">
                                    <table class="table table-striped table-sm">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>DATE</th>
                                                <th>NOM DU PATIENT</th>
                                                <th class="text-right">MONTANT CDF</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($factures as $index => $facture)
                                                <tr>
                                                    <td>{{$index+1}}</td>
                                                    <td>{{$facture->created_at->format('d/m/Y')}}</td>
                                                    <td>{{$facture->patient->name}}</td>
                                                    <td class="text-right">{{$facture->getTotal($facture->id)}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('facturation.prive.create',$facture->id) }}">Facturer</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
                <div class="d-flex justify-content-center">

                </div>
        </div>
    </div>
</div>
