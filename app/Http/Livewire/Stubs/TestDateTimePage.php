<?php

namespace App\Http\Livewire\Stubs;

use App\Helpers\Others\DateFromatHelper;
use App\Models\ActionUser;
use Livewire\Component;

class TestDateTimePage extends Component
{
    public $state=[];
    public $idEditable=false,$actionToEdit;
    public function test(){
        $date=(new DateFromatHelper())->formatDate($this->state['date']);
        ActionUser::create(['date'=>$date,'time'=>$this->state['time']]);
        $this->dispatchBrowserEvent('data-added',['message'=>'Infos bien sauvegardée !']);
    }

    public function edit(ActionUser $action){
        $this->state=$action->toArray();
        $this->actionToEdit=$action;
    }
    public function render()
    {
        return view('livewire.stubs.test-date-time-page',['actions'=>ActionUser::all()]);
    }
}
