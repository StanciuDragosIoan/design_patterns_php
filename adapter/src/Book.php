<?php namespace Acme;



class Book implements BookInterface {
    
    public function open()
    {
        var_dump("Opening book...");
    }

    public function turnPage()
    {
        var_dump("Turning the page...");
    }
}