<?php

declare(strict_types = 1);

namespace ValanticSpryker\Glue\RestRequestValidator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use ValanticSpryker\Glue\RestRequestValidator\Constraints\Model\PhoneNumberUtil;

class PhoneNumberValidator extends ConstraintValidator
{
    /**
     * @inheritDoc
     *
     * @throws \Symfony\Component\Validator\Exception\UnexpectedTypeException
     * @throws \Symfony\Component\Validator\Exception\UnexpectedValueException
     */
    public function validate(mixed $value, Constraint $constraint): void
    {
        if (!$constraint instanceof PhoneNumber) {
            throw new UnexpectedTypeException($constraint, PhoneNumber::class);
        }

        if ($value === null || $value === '') {
            return;
        }

        if (!is_string($value)) {
            throw new UnexpectedValueException($value, 'string');
        }
        $countryCode = (APPLICATION_STORE !== '') ? APPLICATION_STORE : 'DE';
        $isValid = (new PhoneNumberUtil())->validatePhoneNumber($value, $countryCode);

        if (!$isValid) {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{countryCode}}', $countryCode)
                ->setParameter('{{string}}', $value)
                ->addViolation();
        }
    }
}
