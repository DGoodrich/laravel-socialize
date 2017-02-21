<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CreateRepository extends Command
{
    private $interFaceName;
    private $repositoryName;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name : Name of the repository} {--i : Should an interface be created for this repository}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository';

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     */
    public function handle()
    {
        $this->repositoryName = $this->argument('name');
        $this->interFaceName = str_replace('Repository', 'Interface', $this->argument('name'));

        $interfaceCreation = $this->option('i');

        if($interfaceCreation) {
            if($this->createInterfaceFile($this->interFaceName)) {
                $this->info($this->interFaceName. ' created.');
            }
        }

        if($this->createRepositoryFile($this->repositoryName, $interfaceCreation)) {
            $this->info($this->repositoryName. ' created.');
        };
    }

    /**
     * Creates the repository file and contract
     *
     * @param $name
     * @param bool $hasInterface
     * @return mixed
     */
    public function createRepositoryFile($name, $hasInterface = false)
    {
        $fileContents = "<?php \n\nnamespace App\\Models\\Repositories; \n\n".
            ($hasInterface != null ? "use App\\Models\\Contracts\\" . $this->interFaceName . ";\n\n" : "") .
            "class " . $name . " extends BaseRepository implements " . $this->interFaceName . "\n{\n\n}";

        return \File::put(app_path() . '/Models/Repositories/' . $this->repositoryName . '.php', $fileContents);
    }

    /**
     * Creates the interface file
     *
     * @param $name
     * @return mixed
     */
    public function createInterfaceFile($name)
    {
        $fileContents = "<?php \n\nnamespace App\\Models\\Contracts;\n\ninterface " . $name . " extends BaseInterface\n{\n\n}";

        return \File::put(app_path() . '/Models/Contracts/'.$this->interFaceName.'.php', $fileContents);
    }
}