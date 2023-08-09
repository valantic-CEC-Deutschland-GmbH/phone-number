<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PhoneNumber;

use Generated\Shared\Transfer\PhoneNumberTransfer;
use Spryker\Service\Kernel\AbstractService;

/**
 * @method \ValanticSpryker\Service\PhoneNumber\PhoneNumberServiceFactory getFactory()
 * @method \ValanticSpryker\Service\PhoneNumber\PhoneNumberConfig getConfig()
 */
class PhoneNumberService extends AbstractService implements PhoneNumberServiceInterface
{
    /**
     * Checks whether the passed phone number is valid
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function isPhoneNumberValid(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        return ($this->getFactory()->createPhoneNumberUtil()
            ->validatePhoneNumber($phoneNumberTransfer));
    }

    /**
     * Transforms the given form number into the default format
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getPhoneNumberInDefaultFormat(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        return $this->getFactory()->createPhoneNumberUtil()
            ->getPhoneNumberInFormat($phoneNumberTransfer);
    }

    /**
     * Gets the country code for a given region
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getCountryCodeForRegion(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        return $this->getFactory()->createPhoneNumberUtil()->getCountryCodeForRegion($phoneNumberTransfer);
    }
}
