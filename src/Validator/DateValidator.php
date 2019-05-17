<?php
/**
 * @file
 * DateValidator.php
 *
 * @author Josh Parkinson <joshparkinson1991@gmail.com>
 */

namespace JParkinson1991\Common\Date\Validator;

use DateTime;

/**
 * Class DateValidator
 *
 * @package JParkinson1991\Common\Date\Validator
 */
class DateValidator implements DateFormatValidatorInterface
{
    /**
     * Validate that a provided date string is in the expected format.
     *
     * @param string $dateString
     *     The date string to validate the format of
     * @param string $expectedFormat
     *     The expected date format.
     *     Should be a valid date format as defined here: http://php.net/manual/en/function.date.php
     *
     * @return bool
     *     TRUE
     *       - If the date string is in the expected format
     *     FALSE
     *       - If the date string is not in the expected format
     *       - If the date string is invalid
     *       - If the format string is invalid
     */
    public function validInFormat($dateString, $expectedFormat)
    {
        $dt = DateTime::createFromFormat($expectedFormat, $dateString);

        //Check for invalid date or format strings
        if (!$dt instanceof DateTime) {
            return false;
        }

        //Compare the two dates
        //Only if the provided format and date string were valid will this
        //return true.
        return $dt->format($expectedFormat) === $dateString;
    }
}
