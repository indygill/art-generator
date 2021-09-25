<?PHP

namespace Ruco\ArtGenerator\Actions;

use Symfony\Component\Process\Process;

class GenerateImagesAction
{
    protected $command_path = 'neural-net-random-art/random_art.py';
    protected $img_width = 512;
    protected $img_height = 512;
    protected $activation = 'softsign';

    public function execute(Int $images = 1)
    {
        $process = new Process([
            'python3',
            dirname(dirname(__FILE__)) . '/Packages/' . $this->command_path,
            '-img_height',
            $this->img_height,
            '-img_width',
            $this->img_width,
            '-activation',
            $this->activation,
            '-z1',
            $this->getRandomDimension(),
            '-z2',
            $this->getRandomDimension(),
            '-n_images',
            $images
        ]);

        $process->setTimeout(60 * 10);

        $process->run();

        return $process;
    }

    public function setImgWidth(Int $width)
    {
        $this->img_width = $width;
    }

    public function setImgHeight(Int $height)
    {
        $this->img_height = $height;
    }

    protected function getRandomDimension()
    {
        // rand()/getrandmax() gives a float number between 0 and 1
        // if you multiply it by 1 you'll get a number between 0 and 1
        // add the starting number -0.99 and you'll get a number between -0.99 and 1
        // https://stackoverflow.com/questions/3206563/how-to-generate-a-random-positive-or-negative-decimal
        return 0.618;//rand() / getrandmax() * 1 - 0.99;
    }
}
