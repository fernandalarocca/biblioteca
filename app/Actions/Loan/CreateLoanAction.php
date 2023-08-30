<?php

namespace App\Actions\Loan;

use App\Models\Loan;

class CreateLoanAction
{
    public function execute(array $data): Loan
    {
        return app(Loan::class)->create($data);
    }
}
