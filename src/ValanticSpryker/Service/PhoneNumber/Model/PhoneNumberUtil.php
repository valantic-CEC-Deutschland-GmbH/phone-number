<?php

declare(strict_types = 1);

namespace ValanticSpryker\Service\PhoneNumber\Model;

use Generated\Shared\Transfer\PhoneNumberTransfer;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumber as LibPhoneNumber;
use libphonenumber\PhoneNumberUtil as LibPhoneNumberUtil;
use ValanticSpryker\Service\PhoneNumber\PhoneNumberConfig;

class PhoneNumberUtil
{
    /**
     * @param \libphonenumber\PhoneNumberUtil $phoneUtil
     * @param \ValanticSpryker\Service\PhoneNumber\PhoneNumberConfig $config
     */
    public function __construct(private LibPhoneNumberUtil $phoneUtil, private PhoneNumberConfig $config)
    {
    }

    /**
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function validatePhoneNumber(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        $phoneNumberTransfer
            ->requireRegion()
            ->requireNumber();

        $number = $phoneNumberTransfer->getNumber();
        $region = $phoneNumberTransfer->getRegion();
        $phoneNumberObject = null;
        try {
            $phoneNumberObject = $this->phoneUtil->parse($number, $region);
        } catch (NumberParseException $npe) {
            $isValid = false;
        }
        if ($phoneNumberObject instanceof LibPhoneNumber) {
            $isValid = $this->phoneUtil->isValidNumber($phoneNumberObject);
        }
        $phoneNumberTransfer->setIsValid($isValid);

        return $phoneNumberTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getPhoneNumberInFormat(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        $phoneNumberTransfer
            ->requireRegion()
            ->requireNumber();

        $phoneNumber = $phoneNumberTransfer->getNumber();
        $region = $phoneNumberTransfer->getRegion();

        $phoneNumberObject = $this->phoneUtil->parse($phoneNumber, $region);

        $phoneNumber = '';
        if ($phoneNumberObject instanceof LibPhoneNumber) {
            $phoneNumber = $this->phoneUtil->format($phoneNumberObject, $this->config->getDefaultPhoneNumberFormat());
        }

        $phoneNumberTransfer->setNumber($phoneNumber);

        return $phoneNumberTransfer;
    }

    /**
     * @param \Generated\Shared\Transfer\PhoneNumberTransfer $phoneNumberTransfer
     *
     * @return \Generated\Shared\Transfer\PhoneNumberTransfer
     */
    public function getCountryCodeForRegion(PhoneNumberTransfer $phoneNumberTransfer): PhoneNumberTransfer
    {
        $countryCode = $this->phoneUtil->getCountryCodeForRegion($phoneNumberTransfer->getRegion());
        $phoneNumberTransfer->setCountryCode($countryCode);

        return $phoneNumberTransfer;
    }
}
