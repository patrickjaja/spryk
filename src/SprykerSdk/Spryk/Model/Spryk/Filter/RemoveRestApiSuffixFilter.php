<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerSdk\Spryk\Model\Spryk\Filter;

class RemoveRestApiSuffixFilter implements FilterInterface
{
    public const RESTAPI_SUFFIX = 'RestApi';

    /**
     * @return string
     */
    public function getName(): string
    {
        return 'removeRestApiSuffix';
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function filter(string $value): string
    {
        if (mb_strpos($value, static::RESTAPI_SUFFIX) === false) {
            return $value;
        }

        return mb_substr($value, 0, mb_strlen($value) - mb_strlen(static::RESTAPI_SUFFIX));
    }
}
