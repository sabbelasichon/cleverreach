<?php
namespace WapplerSystems\Cleverreach\Powermail\Validator;

use WapplerSystems\Cleverreach\CleverReach\Api;

/**
 * This file is part of the "cleverreach" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 */


class OptoutValidator
{

    protected Api $api;

    public function __construct(Api $api)
    {
        $this->api = $api;
    }

    /**
     * Check if given number is higher than in configuration
     *
     * @param string $value
     * @param string $validationConfiguration
     * @return bool
     */
    public function validate121($value, $validationConfiguration): bool
    {
        $value = trim($value);

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            return FALSE;
        }
        return $this->api->isReceiverOfGroupAndActive($value);
    }


}