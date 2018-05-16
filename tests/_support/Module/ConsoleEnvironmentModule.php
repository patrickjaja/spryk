<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Module;

use Codeception\Module;

class ConsoleEnvironmentModule extends Module
{
    /**
     * @param array $settings
     *
     * @return void
     */
    public function _beforeSuite($settings = [])
    {
        define('APPLICATION_ROOT_DIR', codecept_data_dir());
    }
}
