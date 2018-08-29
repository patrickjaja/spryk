<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerTest\Spryk\Model\Spryk\Builder\Navigation;

use Codeception\Test\Unit;
use Spryker\Spryk\Exception\XmlException;
use Spryker\Spryk\Model\Spryk\Builder\Navigation\NavigationSpryk;
use Spryker\Spryk\Style\SprykStyleInterface;

/**
 * Auto-generated group annotations
 * @group SprykerTest
 * @group Spryk
 * @group Model
 * @group Builder
 * @group Navigation
 * @group NavigationSprykTest
 * Add your own group annotations below this line
 */
class NavigationSprykTest extends Unit
{
    const TARGET_PATH_VALUE = 'emptyFile';
    const MODULE = 'module';
    const CONTROLLER = 'controller';
    const ACTION = 'action';

    /**
     * @var \SprykTest\SprykTester
     */
    protected $tester;

    /**
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        file_put_contents($this->tester->getRootDirectory() . static::TARGET_PATH_VALUE, '<navigation><module><pages></pages></module></navigation>');
    }

    /**
     * @return void
     */
    public function testBuildThrowsExceptionWhenNotSimpleXmlElement(): void
    {
        $this->expectException(XmlException::class);

        $navigationSpryk = $this->getNavigationSprykMockForFailedToLoadFromFile();
        $navigationSpryk->build(
            $this->tester->getSprykDefinition([]),
            $this->getSprykStyleMock()
        );
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Spryker\Spryk\Model\Spryk\Builder\SprykBuilderInterface
     */
    protected function getNavigationSprykMockForFailedToLoadFromFile()
    {
        $mockBuilder = $this->getMockBuilder(NavigationSpryk::class)
            ->disableOriginalConstructor()
            ->setMethods(['loadXmlFromFile']);

        $navigationMock = $mockBuilder->getMock();
        $navigationMock->expects(static::once())->method('loadXmlFromFile')->willReturn(false);

        return $navigationMock;
    }

    /**
     * @return \PHPUnit\Framework\MockObject\MockObject|\Spryker\Spryk\Style\SprykStyleInterface
     */
    protected function getSprykStyleMock()
    {
        $mockBuilder = $this->getMockBuilder(SprykStyleInterface::class);

        return $mockBuilder->getMock();
    }
}