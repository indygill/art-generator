<?PHP

namespace Ruco\ArtGenerator\Actions;

use Symfony\Component\Process\Process;

class ParseGeneratedImageResultsAction
{
    public function execute(String $output, String $dir = '')
    {
        $regex = '/(results\/RGB_generated[0-9+]\.png)/';

        preg_match_all($regex, $output, $matches);

        if(count($matches[0]) < 1) return [];

        $images = $matches[0];

        foreach($images as $key => $path)
        {
            $images[$key] = $dir . '/' . $path;
        }

        return $images;
    }
}
