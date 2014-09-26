# PHP Shell helper

A simple PHP class for API calls

## Installation

Add a dependency on `andou/shelltools` to your project's `composer.json` file if you use [Composer](http://getcomposer.org/) to manage the dependencies of your project.
You have to also add the relative repository.

Here is a minimal example of a `composer.json` file that just defines a dependency on `andou/shelltools`:

```json
{
    "require": {
        "andou/shelltools": "*"
    },
    "repositories": [
    {
      "type": "git",
      "url": "https://github.com/andou/shelltools.git"
    }
  ],
}
```    

## Usage Examples
You can use `andou/shelltools` in your project this way

```php
#!/usr/bin/php
<?php
require_once './vendor/autoload.php';
define('ISCLI', PHP_SAPI === 'cli');
if (ISCLI === true):
  $shell = Andou\Shelltools\Shell::getInstance();
  $shell->getOptions();
  $shell->getFlags();

  for ($index = 0; $index < 1000; $index++) {
    $shell->spinnerStep();
  }

else:
  echo "ERROR: this script is callable only from PHPCLI environment.\n";
  exit(1);
endif;
exit(0);
```

