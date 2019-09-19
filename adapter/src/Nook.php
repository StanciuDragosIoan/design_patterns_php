<?php namespace Acme;

class Nook implements eReaderInterface
{
    public function turnOn()
    {
        var_dump("turn on the Nook...");
    }

    public function pressNextButton()
    {
        var_dump("Press next button for the Nook...");
    }
}