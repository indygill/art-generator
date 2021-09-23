<?PHP

namespace Ruco\ArtGenerator\Actions;

use Symfony\Component\Process\Process;

class GenerateImagesAction
{
    protected $command_path = 'neural-net-random-art/random_art.py';
    protected $img_width = 512;
    protected $img_height = 512;
    protected $colormode = 'RGB';
    protected $alpha = 'false';

    public function execute(Int $images = 1)
    {
        //python random_art.py -img_height 512 -img_width 512 -colormode RGB -alpha False -n_images $images

        $test = new Process(['cwd']);
        $test->run();

        print_r($test->getOutput());

        $process = new Process([
            'python3',
            $this->command_path,
            '-img_height',
            $this->img_height,
            '-img_width',
            $this->img_width,
            '-colormode',
            $this->colormode,
            '-alpha',
            $this->alpha,
            '-n_images',
            $images
        ]);

        $process->run();

        return $process;
    }
}
