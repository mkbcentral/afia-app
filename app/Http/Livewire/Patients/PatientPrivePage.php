<?php

namespace App\Http\Livewire\Patients;

use App\Helpers\Fiches\FicheHelper;
use App\Helpers\Patients\PatientHelper;
use App\Models\PatientPrive;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class PatientPrivePage extends Component
{
    use WithPagination;
    public $state=[],$isEditable,$patientToEdit,$patientToDelete;
    public $type="Privé",$source="Golf",$keySearch="",$pageNumber=3;
    protected $listeners=['patientListener'=>'delete'];

    public function store(){
        $this->valideForm();
        $patientChecked=(new PatientHelper())->chekIfPatientExist($this->state['name'],$this->state['date_of_birth'],$this->type);
        if ($patientChecked) {
        }else{
            $fiche=(new FicheHelper())->create($this->state['fiche_number'],$this->type,$this->source);
            $patient=(new PatientHelper())
                ->create("",$this->state['name'],$this->state['gender'],$this->state['date_of_birth'],
                    $this->state['phone'],$this->state['commune'],$this->state['quartier'],
                    $this->state['numero'],'',$fiche->id,0,0,false);
            $this->dispatchBrowserEvent('data-added',['message'=>'Pateint '.$patient->name.' bien ajouté !']);
        }
    }

    public function edit(PatientPrive $patient){
        $this->state=$patient->toArray();
        $this->isEditable=true;
        $this->patientToEdit=$patient;
    }

    public function update(){
        $patient=(new PatientHelper())
                ->update($this->patientToEdit->id,"",$this->state['name'],$this->state['gender'],$this->state['date_of_birth'],
                    $this->state['phone'],$this->state['commune'],$this->state['quartier'],
                    $this->state['numero'],'',0,0,0,false);
        $this->dispatchBrowserEvent('data-updated',['message'=>'Pateint '.$patient->name.' bien mis à jour !']);
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
                'date_of_birth'=>'required|date',
                'phone'=>'unique:patient_prives,phone',
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
        $this->state['numero']=0;
        $this->state['phone']="+243";
        $this->isEditable=false;
    }

    public function mount(){

    }
    public function render()
    {
        $patients=PatientPrive::where('name','like','%'.$this->keySearch.'%')->paginate($this->pageNumber);
        return view('livewire.patients.patient-prive-page',['patients'=>$patients]);
    }
}
