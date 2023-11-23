<?php

namespace App\Http\Controllers;

use App\Actions\Book\UpdateBookQuantityInStockAction;
use App\Actions\Loan\CreateLoanAction;
use App\Actions\Loan\UpdateLoanAction;
use App\Http\Requests\LoanRequest;
use App\Http\Resources\LoanResource;
use App\Models\Book;
use App\Models\Loan;

class LoanController extends Controller
{
    /**
     * Listar empréstimos
     *
     * Endpoint para listar todos os empréstimos
     *
     * @groups loans
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/loans/list.json
     * @responseFile 404 app/api-documentation/admin/loans/404.json
     */
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $loans = Loan::query()->paginate($perpage);
        $loansResource = LoanResource::collection($loans);
        return view("loan.index", compact("loansResource"));
    }

    /**
     * Visualizar empréstimo
     *
     * Endpoint para listar um único empréstimo
     *
     * @groups loans
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/loans/show.blade.php.json
     */
    public function show(Loan $loan)
    {
        $loan = LoanResource::make($loan);
        return view('loan.show', compact("loan"));
    }

    public function create()
    {
        return view('loan.create');
    }

    /**
     * Criar empréstimo
     *
     * Endpoint para criar um empréstimo
     *
     * @groups loans
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam author_id int required Example: 1
     * @bodyParam book_id int required Example: 2
     * @bodyParam quantity int required Example: 1
     *
     * @responseFile app/api-documentation/admin/loans/create.json
     */
    public function store(LoanRequest $request)
    {
        $data = $request->validated();
        $loan = (new CreateLoanAction())->execute($data);

        $book = app(Book::class)->find($loan->book_id);
        (new UpdateBookQuantityInStockAction())
            ->execute($book, data_get($data,'quantity', 1));

        return redirect()->route('loans.list');
    }

    public function edit(Loan $loan)
    {
        return view('loan.update', compact("loan"));
    }

    /**
     * Editar empréstimo
     *
     * Endpoint para editar um empréstimo
     *
     * @groups loans
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam author_id int required Example: 1
     * @bodyParam book_id int required Example: 2
     * @bodyParam quantity int required Example: 2
     *
     * @responseFile app/api-documentation/admin/loans/update.json
     */
    public function update(LoanRequest $request, Loan $loan)
    {
        $data = $request->validated();
        $loan = (new UpdateLoanAction())->execute($data, $loan);
        return redirect()->route('loans.list');
    }

    /**
     * Deletar empréstimo
     *
     * Endpoint para deletar um empréstimo
     *
     * @groups loans
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/loans/delete.json
     */
    public function delete(Loan $loan)
    {
        $loan->delete();
        return redirect()->back();
    }
}
