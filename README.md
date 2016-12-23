# propeller-ai
PHP Library for the[PropellerAi](http://propeller.rocks/) image recognition API.

## Installation
In your project composer.json file add the following in the require array:

``` bash
"ivanciric/propeller-ai": "1.0.*"
```

Or add it trough the command line from your project root:

``` bash
composer require ivanciric/propeller-ai ~1.0 --with-dependencies
```

Or just clone it and test it as a stand-alone lib:

``` bash
git clone https://github.com/ivanciric/propeller-ai.git
```

## Usage

See example.php file.

Library will return an array of top 5 classification values for a given image.

```php
Array ( 
[0] => Greater Swiss Mountain dog 
[1] => EntleBucher 
[2] => Appenzeller 
[3] => Doberman, Doberman pinscher 
[4] => black-and-tan coonhound 
) 
```