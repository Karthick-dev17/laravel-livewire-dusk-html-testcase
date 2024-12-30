<?php

namespace App\Livewire;

use Illuminate\Http\File;
use Illuminate\Support\Facades\Facade;
use Illuminate\Support\Facades\File as FacadesFile;
use Livewire\Component;

class Dusk extends Component
{
    public $htmlcode, $htmltestcase;

    public function render()
    {
        return view('livewire.dusk');
    }
    function generateRandomString()
    {
        $length = 10;
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = substr(str_shuffle($characters), 0, $length);
        return $randomString;
    }

    public function checkFunctionality()
    {
        $this->validate([
            'htmlcode' => 'required',
            'htmltestcase' => 'required',
        ]);
        $randomname = $this->generateRandomString();

        $filestorepath = '/home/karthick/Desktop/Laravel-projects/dusk-project/public/';
        file_put_contents($filestorepath . $randomname . '.html', $this->htmlcode);

        $testcasefile = <<<EOT
<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class $randomname extends DuskTestCase
{
    /**
     * A basic browser test example.
     */
    public function testBasicExample(): void
    {
        \$this->browse(function (Browser \$browser) {
            \$browser->visit('http://127.0.0.1:8000/$randomname.html')
            $this->htmltestcase
        });
    }
}

EOT;

        file_put_contents('/home/karthick/Desktop/Laravel-projects/dusk-project/tests/Browser/' . $randomname . '.php', $testcasefile);

        $command = "cd /home/karthick/Desktop/Laravel-projects/dusk-project && php artisan dusk tests/Browser/$randomname.php 2>&1";
        $output = shell_exec($command);
        FacadesFile::delete("/home/karthick/Desktop/Laravel-projects/dusk-project/public/$randomname.html");
        FacadesFile::delete("/home/karthick/Desktop/Laravel-projects/dusk-project/tests/Browser/$randomname.php");


        dd($output);
    }
}
