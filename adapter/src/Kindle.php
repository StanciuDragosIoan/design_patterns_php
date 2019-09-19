<?php namespace Acme;

class Kindle implements eReaderInterface
{

    public function turnOn()
    {
        var_dump("Kindle turned on...");
    }

    public function pressNextButton()
    {
        var_dump("Pressing next button...0");
    }
}