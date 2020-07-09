<?php

namespace BinaryStudioAcademy\Game\Galaxies;

use BinaryStudioAcademy\Game\Helpers\Messages;

final class HomeGalaxy extends AbstractGalaxy
{
    public function main()
    {
        $this->writer->writeln(Messages::homeGalaxy());
    }
}