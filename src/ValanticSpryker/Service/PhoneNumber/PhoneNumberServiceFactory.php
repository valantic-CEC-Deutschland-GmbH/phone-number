<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PhoneNumber;

use libphonenumber\PhoneNumberUtil as LibPhoneNumberUtil;
use Spryker\Service\Kernel\AbstractServiceFactory;
use ValanticSpryker\Service\PhoneNumber\Model\PhoneNumberUtil;

/**
 * @method \ValanticSpryker\Service\PhoneNumber\PhoneNumberConfig getConfig()
 */
class PhoneNumberServiceFactory extends AbstractServiceFactory
{
    /**
     * @return \ValanticSpryker\Service\PhoneNumber\Model\PhoneNumberUtil
     */
    public function createPhoneNumberUtil(): PhoneNumberUtil
    {
        return new PhoneNumberUtil($this->getLibPhoneNumberUtil(), $this->getConfig());
    }

    /**
     * @return \libphonenumber\PhoneNumberUtil
     */
    private function getLibPhoneNumberUtil(): LibPhoneNumberUtil
    {
        return LibPhoneNumberUtil::getInstance();
    }
}
