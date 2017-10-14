# ZzpLab\LabScss
Extending Leafo\ScssPhp

## Zzplab\LabScss\LabServer extends Leafo\ScssPhp\Server
Setting output/cache file name using method serve(), example:
```
$server->serve('app.min');
```

## Zzplab\LabScss\LabCompiler extends Leafo\ScssPhp\Compiler
Solves an error when compiling Foundation 6+ css framework on line 3122:
```
  public function get($name, $shouldThrow = true, Environment $env = null)
  {
  ...
    //$nextIsRoot = true;
  ...
  }
```
