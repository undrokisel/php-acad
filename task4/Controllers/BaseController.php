<?php

abstract class BaseController
{
    abstract protected function validate($data): array;

    abstract public function handler($data);
}