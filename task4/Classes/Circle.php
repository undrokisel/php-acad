<?php

use JetBrains\PhpStorm\Pure;

class Circle extends Shape
{
    private float|null $radius = null;
    private float|null $circumference = null;

    #[Pure] public function __construct($parameters = null)
    {
        parent::__construct();
        if (isset($parameters['radius'])) {
            $this->radius = $parameters['radius'];
            $this->area = $this->calcArea();
            $this->circumference = $this->calcCircumference();
            $this->isParametersEnough = true;
        }
    }

    public function getInfo(): array
    {
        if (!empty($this->isParametersEnough)) {
            return [
                "type" => $this->type,
                "radius" => $this->radius,
                "area" => $this->area,
                "circumference" => $this->circumference
            ];
        }
        return [
            "error" => 422,
            "error_message" => 'initial parameters are insufficient or incorrect',
        ];
    }


    protected function calcArea(): float
    {
        return round((2 * M_PI * $this->radius), 2);
    }

    private function calcCircumference(): float
    {
        return round(M_PI * ($this->radius ** 2), 2);
    }
}