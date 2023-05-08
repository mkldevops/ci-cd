<?php

namespace App\Service;

use App\Entity\Book;

class BookFormatter
{
    public function format(Book $book): string
    {
        return sprintf('%s by %s (%s)', $book->getTitle(), $book->getAuthor(), $book->getCategoryName());
    }
}