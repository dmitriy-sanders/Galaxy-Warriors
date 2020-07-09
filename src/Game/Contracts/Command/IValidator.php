<?php

namespace BinaryStudioAcademy\Game\Contracts\Command;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Helpers\Random;

interface IValidator
{
    public function validate(
        string $command,
        ?string $params,
        Random $random,
        Writer $writer
    );
}