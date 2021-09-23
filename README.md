# AI Art Generator
PHP wrapper that uses tuanle618/neural-net-art-generator to generate neural art automatically.

Take a look at [tuanle618/neural-net-art-generator](https://github.com/tuanle618/neural-net-random-art)
for information on how tuanle618/neural-net-random-art works.

# Execution

1. To generate images, call upon the GenerateImagesAction class:

```php
//Instantiate the class
$imageProcess = new GenerateImagesAction();

//Optionally set the image size
$imageProcess->setWidth(1080);
$imageProcess->setHeight(1920);

//Execute the process.
$imageProcess->execute();

//You can pass an optional Int paramter if you'd like to generate more than 1 image
$imageProcess->execute(3);
```

2. Once you've generated your images, call upon the ParseGeneratedImageResultsAction class to extract the absolute paths
 for each generated image:

```php
//Instantiate the class
$pathProcess = new ParseGeneratedImageResultsAction();

// Using the $imageProcess object from the previous step, pass the output and (Symfony Process) current working
// directory.
$pathProcess->execute($imageProcess->getOutput(), $imageProcess->getWorkingDirectory());

//The about method will return an array of paths for each generated image
(
    [0] => results/RGB_generated1.png
    [1] => results/RGB_generated2.png
    [2] => results/RGB_generated3.png
)
```

And that's it. You can manipulate the generated images further from this point however you like.
