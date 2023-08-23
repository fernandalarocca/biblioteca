<?php

namespace App\Actions\Loan;

use App\Http\Resources\LoanResource;
use App\Models\Loan;

class UpdateLoanAction
{
    public function execute(array $data, Loan $loan): LoanResource
    {
        $loan->update($data);
        return LoanResource::make($loan);
    }
}
