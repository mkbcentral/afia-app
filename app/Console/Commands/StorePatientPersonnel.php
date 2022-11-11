<?php

namespace App\Console\Commands;

use App\Models\PatientPersonnel;
use Carbon\Carbon;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StorePatientPersonnel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:patient-personnel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cette commande permet d'importer les fiches des patients perspnnels";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counter=0;
        $worksheet=$this->getActiveSheet(storage_path('data/patients_personnels.xlsx'));
        foreach ($worksheet->getRowIterator() as $row) {
            if($counter++ ==0) continue;
            $iteratorCell=$row->getCellIterator();
            $iteratorCell->setIterateOnlyExistingCells(true);
            $cells=[];
            foreach ($iteratorCell as $cell) {
               $cells[]=$cell->getValue();
            }
            dump($cells);
            /*
            PatientPersonnel::create([
                'name'=>$cells[0].' '.$cells[1].' '.$cells[2],
                'gender'=>$cells[3],
                'date_of_birth'=>$cells[4]=='NULL'?date('Y-m-d'): Carbon::createFromFormat('d/m/Y', $cells[4])->format('Y-m-d'),
                'phone'=>$cells[5],
                'commune'=>$cells[6],
                'quartier'=>$cells[7],
                'avenue'=>$cells[8],
                'numero'=>$cells[9],
                'type'=>$cells[10],
                'fiche_id'=>$cells[11],
                'personnel_service_id '=>$cells[12],
            ]);
            */


        }
        $this->comment("Patints bien importées");
    }

    public function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)->load($path)->getActiveSheet();
    }
}
