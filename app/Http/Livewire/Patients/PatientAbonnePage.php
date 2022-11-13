<?php

namespace App\Http\Livewire\Patients;

use App\Helpers\Fiches\FicheHelper;
use App\Helpers\Others\DateFromatHelper;
use App\Helpers\Patients\PatientHelper;
use App\Models\Abonnement;
use App\Models\Commune;
use App\Models\PatientAbonne;
use App\Models\PatientType;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class PatientAbonnePage extends Component
{
    use WithPagination;
    public $state=[],$isEditable,$patientToEdit,$patientToDelete,$fiche_number_to_edit,$ficheToEdit;
    public $type="Privé",$source="Golf",$keySearch="",$pageNumber=10;
    public $abonnements,$typePatients,$communes;
    protected $listeners=['patientListener'=>'delete'];

    public function store(){
        $date=(new DateFromatHelper())->formatDate($this->state['date_of_birth']);
        //dd($date);
        $this->valideForm();
        $patientChecked=(new PatientHelper())->chekIfPatientExist($this->state['name'],$this->state['date_of_birth'],$this->type);
        if ($patientChecked) {
        }else{

            $fiche=(new FicheHelper())->create($this->state['fiche_number'],$this->type,$this->source);
            $patient=(new PatientHelper())
                ->create($this->state['matricule'],$this->state['name'],$this->state['gender'],$date,
                    $this->state['phone'],$this->state['commune'],$this->state['avenue'],$this->state['quartier'],
                    $this->state['numero'],$this->state['type'],$fiche->id,0,$this->state['abonnement_id'],false,);
            $this->dispatchBrowserEvent('data-added',['message'=>'Pateint '.$patient->name.' bien ajouté !']);
        }
    }

    public function edit(PatientAbonne $patient){
        $this->state=$patient->toArray();
        $this->isEditable=true;
        $this->patientToEdit=$patient;
        $this->fiche_number_to_edit=$patient->fiche->numero;
        $this->ficheToEdit=$patient->fiche;
    }

    public function update(){
        $date=(new DateFromatHelper())->formatDate($this->state['date_of_birth']);
        $patient=(new PatientHelper())
                ->update($this->patientToEdit->id,$this->state['matricule'],$this->state['name'],$this->state['gender'],$date,
                    $this->state['phone'],$this->state['commune'],$this->state['avenue'],$this->state['quartier'],
                    $this->state['numero'],$this->state['type'],0,0,$this->state['abonnement_id'],false);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Pateint '.$patient->name.' bien mis à jour !']);
    }

    public function updateFicheNumber(){
        $this->ficheToEdit->numero=$this->fiche_number_to_edit;
        $this->ficheToEdit->update();
        $this->dispatchBrowserEvent('data-updated',['message'=>'Fiche bien mise à jour !']);
    }

    public function showDeleteDialog(PatientAbonne $patient){
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
                'commune'=>'required',
                'avenue'=>'required',
                'numero'=>'required|numeric',
                'quartier'=>'required',
                'abonnement_id'=>'required|numeric',
                'type'=>'required',
                'fiche_number'=>'required|unique:fiches,numero'
            ]
        )->validate();

    }

    public function resetPropreties(){
        $this->state['commune']="Aucune";
        $this->state['avenue']="Aucun";
        $this->state['quartier']="Aucun";
        $this->state['numero']=0;
        $this->state['phone']="+243";
        $this->isEditable=false;
    }

    public function mount(){
        $this->abonnements=Abonnement::all();
        $this->typePatients=PatientType::all();
        $this->communes=Commune::all();
        $this->state['matricule']=0;
    }
    public function render()
    {
        $patients=PatientAbonne::where('name','like','%'.$this->keySearch.'%')
                ->orWhere('matricule','like','%'.$this->keySearch.'%')
                ->with('fiche')
                ->with('abonnement')
                ->orderBy('patient_abonnes.created_at','DESC')
                ->paginate($this->pageNumber);
        return view('livewire.patients.patient-abonne-page',['patients'=>$patients]);
    }
}
