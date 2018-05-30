<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Spryk\Model\Spryk\Executor;

use Spryker\Spryk\Style\SprykStyleInterface;

interface SprykExecutorInterface
{
    /**
     * @param string $sprykName
     * @param array|null $includeOptionalSubSpryks
     * @param \Spryker\Spryk\Style\SprykStyleInterface $style
     *
     * @return void
     */
    public function execute(string $sprykName, ?array $includeOptionalSubSpryks, SprykStyleInterface $style): void;
}
