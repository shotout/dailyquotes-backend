<?php

namespace App\Imports;

use App\Models\Quote;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithLimit;
use Maatwebsite\Excel\Concerns\WithStartRow;

class QuotesImport implements ToModel,WithStartRow,WithBatchInserts
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
    public function model(array $row)
    {
        return new Quote([
            'title'     => $row[0],
            'category_id'    => $this->category
        ]);
    }
}
