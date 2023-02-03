<?php

class ShapeController extends BaseController
{

    public function handler($data)
    {
        $parameters = $this->validate($data);
        return (new $data['type']($parameters))->getInfo();
    }

    protected function validate($data): array
    {
        $parameters = [];
        if ($data['type'] === 'triangle') {
            $parameters = ['base', 'height'];
        } elseif ($data['type'] === 'circle') {
            $parameters = ['radius'];
        } elseif ($data['type'] === 'square') {
            $parameters = ['side'];
        }
        return $this->checkShapeParameters($parameters, $data['request']);
    }

    private function checkShapeParameters($parameters, $request): array
    {
        $parametersValidated = [];
        foreach ($parameters as $parameter) {
            if (isset($request[$parameter]) && is_numeric($request[$parameter])
                && ($request[$parameter] > 0)) {
                $parametersValidated[$parameter] = round(($request[$parameter]), 10);
            }
        }
        return $parametersValidated;
    }
}