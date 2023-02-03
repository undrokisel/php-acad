<?php

use JetBrains\PhpStorm\Pure;

class Square extends Shape
{
    private float|null $side = null;
    private float|null $perimeter = null;

    #[Pure] public function __construct($parameters = null)
    {
        parent::__construct();
        if (isset($parameters['side'])) {
            $this->side = $parameters['side'];
            $this->area = $this->calcArea();
            $this->perimeter = $this->calcPerimeter();
            $this->isParametersEnough = true;
        }
    }

    public function getInfo(): array
    {
        if (!empty($this->isParametersEnough)) {
            return [
                "type" => $this->type,
                "side" => $this->side,
                "area" => $this->area,
                "perimeter" => $this->perimeter
            ];
        }
        return [
            "error" => 422,
            "error_message" => 'initial parameters are insufficient or incorrect',
        ];
    }

    protected function calcArea(): float
    {
        return round(($this->side ** 2), 2);
    }

    private function calcPerimeter(): float
    {
        return round(($this->side * 4), 2);
    }
}