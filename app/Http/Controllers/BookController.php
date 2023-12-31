<?php

namespace App\Http\Controllers;

use App\Actions\Book\CreateBookAction;
use App\Actions\Book\UpdateBookAction;
use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Listar livros
     *
     * Endpoint para listar todos os livros
     *
     * @groups books
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/books/list.json
     * @responseFile 404 app/api-documentation/admin/books/404.json
     */
    public function list()
    {
        $perpage = request()->query('limit', 5);
        $books = Book::query()->paginate($perpage);
        $booksResource = BookResource::collection($books);
        return view("book.index", compact("booksResource"));
    }

    /**
     * Visualizar livro
     *
     * Endpoint para listar um único livro
     *
     * @groups books
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/books/show.blade.php.json
     */
    public function show(Book $book)
    {
         $book = BookResource::make($book);
         return view('book.show', compact("book"));
    }

    public function create()
    {
        return view('book.create');
    }

    /**
     * Criar livro
     *
     * Endpoint para criar um livro
     *
     * @groups books
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam title string required Example: Os Sete Maridos de Evelyn Hugo
     * @bodyParam synopsis string required Example: uma das maiores estrelas de Hollywood, agora a aproximar-se dos 80 anos, decide finalmente contar tudo sobre a sua vida.
     * @bodyParam category string required Example: Romance
     * @bodyParam published_at date required Example: 2017-06-13
     * @bodyParam quantity_in_stock int required Example: 2
     * @bodyParam author_id int required Example: 1
     *
     * @responseFile app/api-documentation/admin/books/update.json
     */

    public function store(BookRequest $request)
    {
        $data = $request->validated();
        $book = (new CreateBookAction())->execute($data);
        return redirect()->route('books.list');
    }

    public function edit(Book $book)
    {
        return view('book.update', compact("book"));
    }

    /**
     * Editar livro
     *
     * Endpoint para editar um livro
     *
     * @groups books
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @bodyParam title string required Example: Os Sete Maridos de Evelyn Hugo
     * @bodyParam synopsis string required Example: uma das maiores estrelas de Hollywood, agora a aproximar-se dos 80 anos, decide finalmente contar tudo sobre a sua vida.
     * @bodyParam category string required Example: Romance
     * @bodyParam published_at date required Example: 2017-06-13
     * @bodyParam quantity_in_stock int required Example: 3
     * @bodyParam author_id int required Example: 1
     *
     * @responseFile app/api-documentation/admin/books/update.json
     */

    public function update(BookRequest $request, Book $book)
    {
        $data = $request->validated();
        $book = (new UpdateBookAction())->execute($data, $book);
        return redirect()->route('books.list');
    }

    /**
     * Deletar livro
     *
     * Endpoint para deletar um livro
     *
     * @groups books
     *
     * @authenticated
     *
     * @header Content-Type application/json
     * @header Accept application/json
     *
     * @responseFile app/api-documentation/admin/books/delete.json
     */

    public function delete(Book $book)
    {
        $book->loans()->delete();
        $book->delete();
        return redirect()->back();
    }
}
