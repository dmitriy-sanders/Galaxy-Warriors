<?php

namespace BinaryStudioAcademy\Game;

use BinaryStudioAcademy\Game\Commands\CommandValidator;
use BinaryStudioAcademy\Game\Contracts\Io\Reader;
use BinaryStudioAcademy\Game\Contracts\Io\Writer;
use BinaryStudioAcademy\Game\Contracts\Helpers\Random;

class Game
{
    private Random $random;
    private CommandValidator $validator;

    public function __construct(Random $random)
    {
        $this->random = $random;
        $this->validator = new CommandValidator();
    }

    public function start(Reader $reader, Writer $writer)
    {
        $writer->writeln("Welcome to the best console game - 'Galaxy Warriors'!");
        $writer->writeln("Enter 'help' - to see all available commands!");
        $input = trim($reader->read());

        while (true) {
            $this->checkAndExecute($input);

            $input = trim($reader->read());
        }
    }

    public function run(Reader $reader, Writer $writer)
    {
        $input = trim($reader->read());
        $this->checkAndExecute($input);
    }

    private function checkAndExecute(string $input)
    {
        $command = explode(' ', $input)[0];
        $params = explode(' ', $input)[1] ?? null;

        $this->validator->validate($command, $params, $this->random);
    }
}
