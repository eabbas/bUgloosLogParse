<?php

namespace App\Console\Commands;

use App\Classes\ParseLog;
use Illuminate\Console\Command;

class parseLogFile extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'parse:logFile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command parses a logfile named "logs.txt" if it exists in storage log path';
    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(ParseLog $parseLog)
    {
        if($parseLog->parseFile("logs.txt")){
            $this->info("Parsing log is done well.");
            return Command::SUCCESS;
        }

        return Command::FAILURE;

    }
}
