<?php

namespace App\Imports;

use App\Models\Quote;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuotesImport implements ToCollection,WithStartRow,WithBatchInserts
{

    public function  __construct($category)
    {
        $this->category= $category;
    }

    public function startRow(): int
    {
        return 2;
    }

    public function batchSize(): int
    {
        return 1000;
    }

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ';'
        ];
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    
    public function collection(Collection $collection)
    {
        foreach ($collection as $row) 
        {
            Quote::create([
                'title'     => $row[0],
                'category_id'    => $this->category
            ]);
        }
    }
    
}
