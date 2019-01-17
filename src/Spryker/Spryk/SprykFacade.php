<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Spryk;

use Spryker\Spryk\Style\SprykStyleInterface;

class SprykFacade implements SprykFacadeInterface
{
    /**
     * @var \Spryker\Spryk\SprykFactory|null
     */
    protected $factory;

    /**
     * @param string $sprykName
     * @param string[] $includeOptionalSubSpryks
     * @param \Spryker\Spryk\Style\SprykStyleInterface $style
     *
     * @return void
     */
    public function executeSpryk(string $sprykName, array $includeOptionalSubSpryks, SprykStyleInterface $style): void
    {
        $this->getFactory()->createSprykExecutor()->execute($sprykName, $includeOptionalSubSpryks, $style);
    }

    /**
     * @return array
     */
    public function getSprykDefinitions(): array
    {
        return $this->getFactory()->createSprykDefinitionDumper()->dump();
    }

    /**
     * @codeCoverageIgnore
     *
     * @return \Spryker\Spryk\SprykFactory
     */
    protected function getFactory(): SprykFactory
    {
        if ($this->factory === null) {
            $this->factory = new SprykFactory();
        }

        return $this->factory;
    }

    /**
     * @param \Spryker\Spryk\SprykFactory $factory
     *
     * @return \Spryker\Spryk\SprykFacadeInterface
     */
    public function setFactory(SprykFactory $factory): SprykFacadeInterface
    {
        $this->factory = $factory;

        return $this;
    }

    /**
     * @param array $sprykDefinitions
     *
     * @return array
     */
    public function buildArgumentList(array $sprykDefinitions): array
    {
        return $this->getFactory()->createArgumentsListBuilder()->buildArgumentList($sprykDefinitions);
    }

    /**
     * @param array $argumentsList
     *
     * @return int
     */
    public function generateArgumentList(array $argumentsList): int
    {
        return $this->getFactory()->createArgumentListGenerator()->generateArgumentList($argumentsList);
    }

    /**
     * @return array
     */
    public function dumpArgumentList(): array
    {
        return $this->getFactory()->createArgumentListDumper()->dumpArgumentList();
    }
}
