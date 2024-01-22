<?php


namespace Riskisaria\PucukPena\Data;

class person
{
    public function __construct(private string $name)
    {
    }

    public function callname(string $name)
    {
        return "Hello $name, My Name is $this->name";
    }
}
