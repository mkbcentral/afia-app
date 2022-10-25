<?php

namespace App\Console\Commands;

use App\Models\Fiche;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class StoreFiche extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:fiche';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Enregistrer les fiche sur un fichier excel';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $counter=0;
        $worksheet=$this->getActiveSheet(storage_path('data/fiches.xlsx'));
        foreach ($worksheet->getRowIterator() as $row) {
            if($counter++ ==0) continue;
            $iteratorCell=$row->getCellIterator();
            $iteratorCell->setIterateOnlyExistingCells(true);
            $cells=[];
            foreach ($iteratorCell as $cell) {
               $cells[]=$cell->getValue();
            }

            Fiche::create([
                'id'=>$cells[0],
                'numero'=>$cells[1],
                'type'=>$cells[2],
                'source'=>$cells[3]
            ]);
        }
        $this->comment("Fiche bien importées");
    }

    public function getActiveSheet(string $path): Worksheet
    {
        return (new Xlsx)->load($path)->getActiveSheet();
    }
}
