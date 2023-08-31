<?php

namespace Tests\Unit\Actions\Book;

use App\Actions\Book\UpdateBookQuantityInStockAction;
use App\Models\Book;
use Tests\Cases\TestCaseUnit;

class UpdateBookQuantityInStockActionUnitTest extends TestCaseUnit
{
    public function test_should_created_loan_success()
    {
        $bookMock = $this->getMockBuilder(Book::class)
            ->onlyMethods(['save'])
            ->getMock();

        $bookMock->expects($this->once())
            ->method('save');

        $quantity = round(10, 99);
        $quantityInStock = round(100, 999);

        $bookMock->quantity_in_stock = $quantityInStock;
        $book = (new UpdateBookQuantityInStockAction())->execute($bookMock, $quantity);

        $this->assertEquals($book, $bookMock);
        $this->assertEquals($book->quantity_in_stock, ($quantityInStock - $quantity));
    }
}
