<?php

use JetBrains\PhpStorm\Pure;

class Triangle extends Shape
{
    private float|null $base = null;
    private float|null $height = null;

    #[Pure] public function __construct($parameters = null)
    {
        {
            parent::__construct();
            if (isset($parameters['height'], $parameters['base'])) {
                $this->isParametersEnough = true;
                $this->height = $parameters['height'];
                $this->base = $parameters['base'];
                $this->area = $this->calcArea();
            }
        }
    }

    //Площадь треугольника вычисляется через основание и высоту по формуле : S=0,5*a*h
    protected function calcArea(): float
    {
        return round(($this->base * $this->height * 0.5), 2);
    }

    public function getInfo(): array
    {
        if (!empty($this->isParametersEnough)) {
            return [
                "type" => $this->type,
                "base" => $this->base,
                "height" => $this->height,
                "area" => $this->area,
            ];
        }
        return [
            "error" => 422,
            "error_message" => 'initial parameters are insufficient or incorrect',
        ];
    }
}