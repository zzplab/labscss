# ZzpLab\LabScss
Extending [Leafo\ScssPhp](https://github.com/leafo/scssphp)



## Zzplab\LabScss\LabServer extends Leafo\ScssPhp\Server
Setting output/cache file name using method serve(), example:
```
$server->serve('app.min');
```

## Zzplab\LabScss\LabCompiler extends Leafo\ScssPhp\Compiler
Solves an error when compiling Zurb/Foundation 6+ css framework @ Compiler.php:3122:
https://github.com/leafo/scssphp/issues/446
```
  public function get($name, $shouldThrow = true, Environment $env = null)
  {
  ...
    //$nextIsRoot = true;
  ...
  }
```

## Install

```
composer require zzplab/labscss
```

## Example use

```
<?php
require PATH_TO_VENDOR . '/vendor/autoload.php';

use Zzplab\LabScss\LabCompiler;
use Zzplab\LabScss\LabServer;

$scss = new LabCompiler();
$scss->setFormatter('Leafo\ScssPhp\Formatter\Compressed');
$server = new LabServer(__DIR__, __DIR__, $scss);
$server->serve('app.min');

```
In your browser you can use with or without .scss extension and set css versions on the fly speeding up development:
```
.../scss.php/app
.../scss.php/app.scss
.../scss.php/app/1.4.8
.../scss.php/app/1.4.8-dev
```

Checkout the Leafo/ScssPhp homepage, http://leafo.github.io/scssphp, for directions on how to use the scssphp compiler.

### Note
My intention with this Leafo/ScssPhp wrapper is to make updating and maintainance easier for my self using composer and add some extra functions while they are not available (yet) in Leafo/ScssPhp itself.

Feel free to use it or respond with issue or request.
