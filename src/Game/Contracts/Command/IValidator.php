<?php

namespace BinaryStudioAcademy\Game\Contracts\Command;

interface IValidator
{
    public function validate(string $command, ?string $params);
}