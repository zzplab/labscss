<?php
/**
 * Zzplab\LabScss\LabCompiler extends Leafo\ScssPhp\Server
 *
 * Solves an error when compiling Foundation 6+ css framework:
 * //$nextIsRoot = true;
 *
 * @license http://opensource.org/licenses/MIT MIT
 *
 */
 
namespace Zzplab\LabScss;

use Leafo\ScssPhp\Compiler;
use Leafo\ScssPhp\Compiler\Environment;

class LabCompiler extends Compiler
{
       
  public function get($name, $shouldThrow = true, Environment $env = null)
  {
    $normalizedName = $this->normalizeName($name);
    $specialContentKey = static::$namespaces['special'] . 'content';

    if (! isset($env)) {
      $env = $this->getStoreEnv();
    }

    $nextIsRoot = false;
    $hasNamespace = $normalizedName[0] === '^' || $normalizedName[0] === '@' || $normalizedName[0] === '%';

    for (;;) {
      if (array_key_exists($normalizedName, $env->store)) {
        return $env->store[$normalizedName];
      }

      if (! $hasNamespace && isset($env->marker)) {
        if (! $nextIsRoot && ! empty($env->store[$specialContentKey])) {
          $env = $env->store[$specialContentKey]->scope;
          //$nextIsRoot = true;
          continue;
        }

        $env = $this->rootEnv;
        continue;
      }

      if (! isset($env->parent)) {
        break;
      }

      $env = $env->parent;
    }

    if ($shouldThrow) {
        $this->throwError("Undefined variable \$$name");
    }

    // found nothing
  }

}
