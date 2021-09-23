<?PHP
use PHPUnit\Framework\TestCase;
use Ruco\ArtGenerator\Actions\GenerateImagesAction;
use Ruco\ArtGenerator\Actions\ParseGeneratedImageResultsAction;

final class GenerateImagesTest extends TestCase
{
    /**
     * @group generateImages
     * Tests to ensure images can be generated
     */
    public function testProcessIsSuccessful()
    {
        $generateImagesAction = new GenerateImagesAction();

        $result = $generateImagesAction->execute();

        $this->assertTrue($result->isSuccessful());
    }

    /**
     * @group locateImages
     * Tests to ensure the correct array of paths is returned for each generated image
     */
    public function testCanParseResults()
    {
        $generateImagesAction = new GenerateImagesAction();

        $generateImagesAction->setImgWidth(2000);
        $generateImagesAction->setImgHeight(2000);

        $process = $generateImagesAction->execute();

        if(!$process->isSuccessful()) return;

        $parseGeneratedImageResults = new ParseGeneratedImageResultsAction();

        $result = $parseGeneratedImageResults->execute($process->getOutput(), $process->getWorkingDirectory());

        $this->assertContains('/home/indy/packages/ruco/art-generator/results/RGB_generated1.png', $result);

    }
}
