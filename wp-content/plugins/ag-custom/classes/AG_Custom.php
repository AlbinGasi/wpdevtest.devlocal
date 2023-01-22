<?php

/**
 * Class is used for general customizations
 * It's treated as a main class from where we include all other classes and modules in this folder
 */
class AG_Custom
{

    public function main() {

        // Load modules
        $this->loadModules();

    }

    /**
     * Load all modules
     * @return void
     */
    public function loadModules() {
        $path = AG_MODULES . '/*';
        foreach ( glob($path) as $folder ) {
            $folderPath = glob($folder . '/module.php');
            if ( !empty($folderPath) ) {
                foreach ( $folderPath as $filePath ) {
                    require $filePath;
                }
            }
        }
    }

}