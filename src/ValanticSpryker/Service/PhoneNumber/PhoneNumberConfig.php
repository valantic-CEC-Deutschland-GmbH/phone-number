<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PhoneNumber;

use libphonenumber\PhoneNumberFormat;
use Spryker\Service\Kernel\AbstractBundleConfig;
use ValanticSpryker\Shared\PhoneNumber\PhoneNumberConstants;

class PhoneNumberConfig extends AbstractBundleConfig
{
    /**
     * @return int
     */
    public function getDefaultPhoneNumberFormat(): int
    {
        return $this->get(PhoneNumberConstants::PHONE_NUMBER_SERVICE_DEFAULT_FORMAT, PhoneNumberFormat::E164);
    }
}
