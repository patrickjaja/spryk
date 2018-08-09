<?php

/**
 * MIT License
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Spryk\Model\Spryk\Definition\Argument\Callback;

use Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Collection\CallbackCollection;
use Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Collection\CallbackCollectionInterface;
use Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Resolver\CallbackArgumentResolver;
use Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Resolver\CallbackArgumentResolverInterface;

class CallbackFactory
{
    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Resolver\CallbackArgumentResolverInterface
     */
    public function createCallbackArgumentResolver(): CallbackArgumentResolverInterface
    {
        return new CallbackArgumentResolver(
            $this->createCallbackCollection()
        );
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\Collection\CallbackCollectionInterface
     */
    public function createCallbackCollection(): CallbackCollectionInterface
    {
        return new CallbackCollection([
            $this->createZedFactoryMethodNameCallback(),
            $this->createZedBusinessModelTargetFilenameCallback(),
            $this->createZedBusinessModelInterfaceTargetFilenameCallback(),
            $this->createZedBusinessModelSubDirectoryCallback(),
            $this->createZedPresentationTwigFilterActionCallback(),
            $this->createZedTestMethodNameCallback(),
            $this->createClassNameShortCallback(),
            $this->createGluResourcePluginCallback(),
            $this->createGlueResourceConstantNameCallback(),
            $this->createGlueResourceConstantValueCallback(),
            $this->createGlueResourceControllerRouteCallback(),
        ]);
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedFactoryMethodNameCallback(): CallbackInterface
    {
        return new ZedBusinessFactoryMethodNameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedBusinessModelTargetFilenameCallback(): CallbackInterface
    {
        return new ZedBusinessModelTargetFilenameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedBusinessModelInterfaceTargetFilenameCallback(): CallbackInterface
    {
        return new ZedBusinessModelInterfaceTargetFilenameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedBusinessModelSubDirectoryCallback(): CallbackInterface
    {
        return new ZedBusinessModelSubDirectoryCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedPresentationTwigFilterActionCallback(): CallbackInterface
    {
        return new ZedPresentationTwigNormalizeFileNameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createZedTestMethodNameCallback(): CallbackInterface
    {
        return new ZedTestMethodNameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createClassNameShortCallback(): CallbackInterface
    {
        return new ClassNameShortCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createGluResourcePluginCallback(): CallbackInterface
    {
        return new GlueResourcePluginCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createGlueResourceConstantNameCallback(): CallbackInterface
    {
        return new GlueResourceConstantNameCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createGlueResourceConstantValueCallback(): CallbackInterface
    {
        return new GlueResourceConstantValueCallback();
    }

    /**
     * @return \Spryker\Spryk\Model\Spryk\Definition\Argument\Callback\CallbackInterface
     */
    public function createGlueResourceControllerRouteCallback(): CallbackInterface
    {
        return new GlueResourceControllerRouteCallback();
    }
}
