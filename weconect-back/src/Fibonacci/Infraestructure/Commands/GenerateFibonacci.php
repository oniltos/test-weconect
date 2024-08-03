<?php

declare(strict_types=1);

namespace Fibonacci\Infraestructure\Commands;

use Illuminate\Console\Command;
use Fibonacci\Domain\Fibonacci;

class GenerateFibonacci extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:fibonacci {n : The number of Fibonacci sequence terms to generate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate Fibonacci sequence up to a given number of terms';


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(protected readonly Fibonacci $fibonacciService) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $n = (int) $this->argument('n');

        if ($n <= 0) {
            $this->error('The number of terms must be a positive integer.');
            return 1;
        }

        $sequence = $this->fibonacciService->generate($n);

        $this->info('Fibonacci sequence:');
        $this->line(implode(', ', $sequence));

        return 0;
    }
}
