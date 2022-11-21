<?php

namespace App\Http\Livewire\Patients;

use App\Helpers\Facture\FactureFormatNumberHelper;
use App\Helpers\Facture\FacturePriveHelper;
use App\Helpers\Facture\Prive\FacturePriveHelper as PriveFacturePriveHelper;
use App\Helpers\Fiches\FicheHelper;
use App\Helpers\Others\DateFromatHelper;
use App\Helpers\Patients\PatientHelper;
use App\Models\Commune;
use App\Models\Consultation;
use App\Models\FacturePrive;
use App\Models\PatientPrive;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class PatientPrivePage extends Component
{
    use WithPagination;
    public $state=[],$isEditable,$patientToEdit,$patientToAdd,$patientToDelete,$fiche_number_to_edit,$ficheToEdit;
    public $type="Privé",$source="Golf",$keySearch="",$pageNumber=10,$communes,$consultations,$consultation_id;
    protected $listeners=['patientListener'=>'delete'];

    public function store(){
        $date=(new DateFromatHelper())->formatDate($this->state['date_of_birth']);
        $this->valideForm();
        $patientChecked=(new PatientHelper())->chekIfPatientExist($this->state['name'],$this->state['date_of_birth'],$this->type);
        if ($patientChecked) {
            $this->dispatchBrowserEvent('data-deleted',['message'=>'Ce patient est déjà enregistré !']);
        }else{
            $fiche=(new FicheHelper())->create($this->state['fiche_number'],$this->type,$this->source);
            $patient=(new PatientHelper())
                ->create("",$this->state['name'],$this->state['gender'],$date,
                    $this->state['phone'],$this->state['commune'],$this->state['avenue'],$this->state['quartier'],
                    $this->state['numero'],'',$fiche->id,0,0,false);
            $facture=(new PriveFacturePriveHelper())
                    ->create($this->consultation_id,$patient->id,null,date('m'));
            if ($facture=="exist") {
                $this->dispatchBrowserEvent('data-deleted',['message'=>'Ce patient a déjà une demande pour ce mois']);
            } else {
                $this->dispatchBrowserEvent('data-added',['message'=>'Pateint '.$patient->name.' bien ajouté !']);
            }

        }
    }

    public function edit(PatientPrive $patient){
        $this->state=$patient->toArray();
        $this->isEditable=true;
        $this->patientToEdit=$patient;
        $this->patientToAdd=$patient;
        $this->fiche_number_to_edit=$patient->fiche->numero;
        $this->ficheToEdit=$patient->fiche;
    }

    public function update(){
        $date=(new DateFromatHelper())->formatDate($this->state['date_of_birth']);
        $patient=(new PatientHelper())
                ->update($this->patientToEdit->id,"",$this->state['name'],$this->state['gender'],$date,
                    $this->state['phone'],$this->state['commune'],$this->state['avenue'],$this->state['quartier'],
                    $this->state['numero'],'',0,0,0,false);

        $this->dispatchBrowserEvent('data-updated',['message'=>'Pateint '.$patient->name.' bien mis à jour !']);
    }

    public function updateFicheNumber(){
        $this->ficheToEdit->numero=$this->fiche_number_to_edit;
        $this->ficheToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Fiche bien mise à jour !']);
    }

    public function showDeleteDialog(PatientPrive $patient){
        $this->dispatchBrowserEvent('delete-patient-dialog');
        $this->patientToDelete=$patient;
    }

    public function delete(){
        $fiche=(new FicheHelper())->getFiche($this->patientToDelete->fiche_id);
        $this->patientToDelete->delete();
        $fiche->delete();
        $this->dispatchBrowserEvent('data-dialog-deleted',['message'=>"Fiche bien retirée!"]);
    }
    public function valideForm(){
        Validator::make(
            $this->state,
            [
                'name'=>'required',
                'gender'=>'required',
                'date_of_birth'=>'required',
                'phone'=>'required',
                'avenue'=>'required',
                'commune'=>'required',
                'numero'=>'required|numeric',
                'quartier'=>'required',
                'fiche_number'=>'required|unique:fiches,numero'
            ]
        )->validate();

    }

    public function resetPropreties(){
        $this->state['commune']="Aucune";
        $this->state['quartier']="Aucun";
        $this->state['avenue']="Aucun";
        $this->state['numero']=0;
        $this->state['phone']="+243";
        $this->isEditable=false;
    }

    public function createNewFacture(){
        $facture=(new PriveFacturePriveHelper())
            ->create($this->consultation_id,$this->patientToAdd->id,null,date('m'));
        if ($facture=="exist") {
            $this->dispatchBrowserEvent('data-deleted',['message'=>'Ce patient a déjà une demande pour ce mois']);
        } else {
            $this->dispatchBrowserEvent('data-added',['message'=>'Demande bien réalisée!']);
        }
    }

    public function mount(){
        $this->communes=Commune::all();
        $this->consultations=Consultation::all();
    }
    public function render()
    {
        $patients=PatientPrive::where('name','like','%'.$this->keySearch.'%')
                ->with('fiche')
                ->orderBy('created_at','DESC')
                ->paginate($this->pageNumber);
        return view('livewire.patients.patient-prive-page',['patients'=>$patients]);
    }
}
