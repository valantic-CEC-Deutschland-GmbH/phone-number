<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PhoneNumber;

use Generated\Shared\Transfer\PhoneNumberTransfer;

interface PhoneNumberServiceInterface
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
    public function isPhoneNumberValid(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer;

    /**
     * Transforms the given phone number into the default format
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getPhoneNumberInDefaultFormat(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer;

    /**
     * Gets the country code for a given region
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getCountryCodeForRegion(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer;
}
