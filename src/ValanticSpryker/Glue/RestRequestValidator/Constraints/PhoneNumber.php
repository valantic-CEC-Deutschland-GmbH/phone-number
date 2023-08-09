<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\RestRequestValidator\Constraints;

use Symfony\Component\Validator\Constraint;

class PhoneNumber extends Constraint
{
    /**
     * @var string
     */
    public $countryCode;

    /**
     * @var string
     */
    public $message = "The phone number '{{string}}' is not of the correct format for the country '{{countryCode}}'.";

    /**
     * @var \ValanticSpryker\Service\PhoneNumber\PhoneNumberServiceInterface
     */
    public $phoneNumberService;
}
