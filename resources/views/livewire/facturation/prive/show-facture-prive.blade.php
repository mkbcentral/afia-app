  <!-- Modal -->
  <div wire:ignore.self class="modal fade" id="showFacturePrive" tabindex="-1" role="dialog"
        aria-labelledby="showFacturePriveLabel" aria-hidden="true" data-backdrop="static">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="text-center" id="showFacturePriveLabel">DETAIL FACTURE</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @php
            $total_consultation=0;$total_labo=0;$total_radio=0;$total_acte=0;
        @endphp
        <div class="modal-body">
            @if ($factureData==null)
                <div class="text-center mt-4 p-4">
                    <h3 class="text-success"><i class="fa fa-database" aria-hidden="true"></i> Aucun detail </h3>
                </div>
            @else
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-uppercase text-danger">Facture n°: {{$factureData->numero}}</h4>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <div>
                                <div><span class="text-bold">N° Fiche: </span>{{$factureData->patient->fiche->numero}}</div>
                                <div><span class="text-bold">Nom: </span>{{$factureData->patient->name}}</div>
                                <div><span class="text-bold">Genre: </span>{{$factureData->patient->gender}}</div>
                            </div>
                            <div>
                                <div><span class="text-bold">Age: </span>{{$factureData->patient->getAge($factureData->patient->date_of_birth)}}</div>
                                <div><span class="text-bold">Etat: </span>{{$factureData->patient->is_interneted==false?'Ambulant':'Hospitalisé'}}</div>
                                <div><span class="text-bold">Admise: </span>{{$factureData->created_at->format('d/m/Y')}}</div>
                            </div>
                        </div>

                    </div>
                </div>
                <table class="table table-sm">
                    @include('components.facture.details-consultation')

                    @include('components.facture.detail-acte')

                    @include('components.facture.detail-labo')

                    @include('components.facture.detail-radio')
                </table>
            @endif
        </div>
      </div>
    </div>
  </div>
