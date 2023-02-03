<?php

abstract class Shape
{
    protected string $type;
    protected float|null $area;
    protected bool $isParametersEnough = false;

    public function __construct()
    {
        $this->type = strtolower($this::class);
    }

    abstract public function getInfo(): array;

    abstract protected function calcArea(): float;


}