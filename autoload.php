<?php

  function autoload($class_name) {
    $dirs = array(
              'models/', // Project specific classes (+Core Overrides)
              'controllers/', // Core classes example
              'system/',   // Unit test classes, if using PHP-Unit
          );

        // Looping through each directory to load all the class files. It will only require a file once.
        // If it finds the same class in a directory later on, IT WILL IGNORE IT! Because of that require once!
        foreach( $dirs as $dir ) {
            if (file_exists($dir.$class_name.'.php')) {
                require_once($dir.$class_name.'.php');
                return;
            }
        }
    }

    spl_autoload_register("autoload");
 ?>
