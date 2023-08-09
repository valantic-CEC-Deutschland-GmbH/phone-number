<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\RestRequestValidator\Constraints\Model;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumber as LibPhoneNumber;
use libphonenumber\PhoneNumberUtil as LibPhoneNumberUtil;

class PhoneNumberUtil
{
    /**
     * @var \libphonenumber\PhoneNumberUtil
     */
    private $phoneUtil;

    public function __construct()
    {
        $this->phoneUtil = LibPhoneNumberUtil::getInstance();
    }

    /**
     * @param string $number
     * @param string $countryCode
     *
     * @return bool
     */
    public function validatePhoneNumber(string $number, string $countryCode): bool
    {
        try {
            $phoneNumberObject = $this->phoneUtil->parse($number, $countryCode);
        } catch (NumberParseException $npe) {
            return false;
        }
        if (!$phoneNumberObject instanceof LibPhoneNumber) {
            return false;
        }

        return $this->phoneUtil->isValidNumber($phoneNumberObject);
    }
}
