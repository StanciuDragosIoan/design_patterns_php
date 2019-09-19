<?php

require "vendor/autoload.php";

use Acme\Book;
use Acme\BookInterface;
use Acme\Kindle;
use Acme\Nook;
use Acme\eReaderAdapter;

class Person {
    public function read(BookInterface $book)
    {
        $book->open();
        $book->turnPage();
    }
}

(new Person)->read(new eReaderAdapter(new Nook));//works