<?php

namespace BinaryStudioAcademy\Game\Contracts\Galaxy;

use BinaryStudioAcademy\Game\Contracts\Io\Writer;

interface IGalaxy
{
    public function __construct(string $params, Writer $writer);
}