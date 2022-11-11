<?php

namespace App\Console\Commands;

use App\Models\PatientAbonne;
use Carbon\Carbon;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StorePatientAbonne extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:patient-abonne';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Cette commande permet d'importer les patients abonnés dans un fichier excel";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counter=0;
        $worksheet=$this->getActiveSheet(storage_path('data/patients_abonnes.xlsx'));
        foreach ($worksheet->getRowIterator() as $row) {
            if($counter++ ==0) continue;
            $iteratorCell=$row->getCellIterator();
            $iteratorCell->setIterateOnlyExistingCells(true);
            $cells=[];
            foreach ($iteratorCell as $cell) {
               $cells[]=$cell->getValue();
            }

            PatientAbonne::create([
                'matricule'=>$cells[0],
                'name'=>$cells[1].' '.$cells[2].' '.$cells[3],
                'gender'=>$cells[4],
                'date_of_birth'=>$cells[5]=='NULL'?date('Y-m-d'): Carbon::createFromFormat('d/m/Y', $cells[5])->format('Y-m-d'),
                'phone'=>$cells[6],
                'commune'=>$cells[7],
                'quartier'=>$cells[8],
                'avenue'=>$cells[9],
                'numero'=>$cells[10],
                'type'=>$cells[11],
                'fiche_id'=>$cells[12],
                'abonnement_id'=>$cells[13],
            ]);


        }
        $this->comment("Patints bien importées");
    }

    public function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)->load($path)->getActiveSheet();
    }
}
