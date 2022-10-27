<?php

namespace App\Console\Commands;

use App\Models\PatientPrive;
use Carbon\Carbon;
use DateTime;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StorePatientPrive extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:patient-prive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cette commande sert à importer les patient privés sur un fichier excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counter=0;
        $worksheet=$this->getActiveSheet(storage_path('data/patients_prives.xlsx'));
        foreach ($worksheet->getRowIterator() as $row) {
            if($counter++ ==0) continue;
            $iteratorCell=$row->getCellIterator();
            $iteratorCell->setIterateOnlyExistingCells(true);
            $cells=[];
            foreach ($iteratorCell as $cell) {
               $cells[]=$cell->getValue();
            }

            dump($cells);

            PatientPrive::create([
                'name'=>$cells[0].' '.$cells[1].' '.$cells[2],
                'gender'=>$cells[3],
                'date_of_birth'=>$cells[4]=='NULL'?date('Y-m-d'): Carbon::createFromFormat('d/m/Y', $cells[4])->format('Y-m-d'),
                'phone'=>$cells[5],
                'commune'=>$cells[6],
                'quartier'=>$cells[7],
                'numero'=>$cells[8],
                'fiche_id'=>$cells[10],
            ]);


        }
        $this->comment("Patints bien importées");
    }

    public function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)->load($path)->getActiveSheet();
    }
}
