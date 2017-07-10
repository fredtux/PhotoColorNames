# PhotoColorNames
**Heterogeneous libraries integrator for image color extraction and naming**

## Usage
A simple example with comments
```php
<?php
### OPTIONAL (depending on settings) ###
// Include autoload - may not be necessary if it has already been done
include __DIR__ . '/vendor/autoload.php';

// Used classes
/// For color extraction
use PhotoColorNames\PhotoColors\PhotoColorFactory;
use PhotoColorNames\PhotoColors\PhotoColorOptions;
/// For color naming
use PhotoColorNames\ColorNames\ColorNamesFactory;
use PhotoColorNames\ColorNames\NamePool;
use PhotoColorNames\NameColor;
### END OF OPTIONAL ###

### MAIN ###
// Extract colors
/// Use the factory to retrieve a new object for color extraction
$photoColors = PhotoColorFactory::getColorExtractor('ColorThief'); // Has to be installed via composer - 'GetMostCommonColors' can be used instead
/// Specify options - the most important is the file path
$photoColorOptions = new PhotoColorNames\PhotoColors\PhotoColorExtractorOptions(__DIR__ . '/test/images/test.jpg'); // Assuming there is a test image at this path
// Manually set each option, or set all options except the file path to their default value
$photoColorOptions->setDefaultOptions();

// Name the colors
/// Use the factory to retrieve a new object for color naming
$nameGiver = ColorNamesFactory::getColorNameGiver('ntc');
/// Use a list of names
$nameList = NamePool::getNtcNames();

// Construct object using the 4 variables declared before
$nameColor = new NameColor($photoColors, $photoColorOptions, $nameGiver, $nameList);

// Use the newly created object to get the names of the most frequently used colors in the file
$x = $nameColor->getNamesOfFrequentlyUsedColors();
### END OF MAIN ###

// Print result (not part of MAIN because it's not necessary)
print_r($x);
```
## Adding new libraries
### By Source
#### Composer
Just add it to composer.json and install. Composer will integrate it easily into the project.
#### Non-composer
It is recommended, though not enforced, to place it into the **NoComposer** folder under the **ColorNames** or **PhotoColors** folders depending on the purpose of the new library.

### By Type
#### Color Extractors
##### Libraries
1. An adapter must be created in src/PhotoColors/Adapters
2. The adapter must implement iPhotoColorExtractor
   - has a function called **getColors**
   - has 1 parameter
     - **$photoColorExtractorOptions** of type **PhotoColorExtractorOptions** 
   - implements all the logic necessary to issue the same type of results like the examples from 5 (no return type enforced since it's designed to run on PHP >= 5.6)
3. The action of constructing an object of the adapter's type must be placed in a new case under the switch from the method **getColorExtractor** from **PhotoColorFactory**
4. The new library can be used by creating an object from the factory
   ```php
   PhotoColorFactory::getColorExtractor('ColorExtractorLibrary');
   ```
5. Examples
   - PhotoColorNames\PhotoColors\Adapters\ColorThiefAdapter
   - GetMostCommonColorsAdapter
#### Extractor options
New extractor options classes can be specified, but have to be paired with the color extractor class
1
#### Color Names
##### Libraries
1. An adapter must be created in src/ColorNames/Adapters
2. The adapter must implement iPhotoColorNamesGiver
   - has a function called **getName**
   - has 2 parameters
     - **$colorName** of type **ColorData** 
     - **$nameList** of type **array**
   - implements all the logic necessary to issue the same type of results like the example from 5 (no return type enforced since it's designed to run on PHP >= 5.6)
3. The action of constructing an object of the adapter's type must be placed in a new case under the switch from the method **getColorNameGiver** from **ColorNamesFactory**
4. The new library can be used by creating an object from the factory
   ```php
   ColorNamesFactory::getColorNameGiver('ColorNamingLibrary');
   ```
5. Examples
   - PhotoColorNames\ColorNames\Adapters\NtcAdapter
##### Name lists
It is recommended, though not enforced, to add new name lists to **NamePool** as a static method that returns an array which has the key as the color's RGB hex code and the value as an array containing the name

## License
This project is released under MIT license.  
In this project there are algorithms from various sources. I do my best to respect the code license and give credit to the owner, but if you think your license has been breached, please feel free to open an issue and I'll solve it as soon as possible. 