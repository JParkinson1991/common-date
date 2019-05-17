<?php
/**
 * @file
 * DateTimeFactory.php
 *
 * @author Josh Parkinson <joshparkinson1991@gmail.com>
 */

namespace JParkinson1991\Common\Date\Factory;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
use Exception;
use InvalidArgumentException;

/**
 * Class DateTimeFactory
 *
 * @package JParkinson1991\Common\Date
 */
class DateTimeFactory implements DateTimeFactoryInterface
{
    /**
     * Returns a new date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object fom
     * @param null|string $format
     *     The date format string
     *     If provided it will be assumed that $from is a string date representation and handled as such
     *
     * @return DateTime
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function newDateTime($from, $format = null)
    {
        return self::createDateTime($from, $format);
    }

    /**
     * Returns a new immutable date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object fom
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such
     *
     * @return DateTimeImmutable
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public function newDateTimeImmutable($from, $format = null)
    {
        return self::createDateTimeImmutable($from, $format);
    }

    /**
     * Returns a new date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object fom
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such
     *
     * @return DateTime
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public static function createDateTime($from, $format = null)
    {
        //Return unnecessary calls to the method
        if ($from instanceof DateTime) {
            return $from;
        }

        //If a format provided, create date time from it and $from
        if ($format !== null) {
            $dateTime = DateTime::createFromFormat($format, $from);
            if ($dateTime->format($format) !== $from) {
                throw new InvalidArgumentException('Invalid date value/format pair provided.');
            }

            return $dateTime;
        }

        //If not a timestamp convert it to one
        if (!is_numeric($from)) {
            $from = strtotime($from);
        }

        $dateTime = new DateTime('@'.$from);
        $dateTime->setTimezone(new DateTimeZone(date_default_timezone_get()));

        return $dateTime;
    }

    /**
     * Returns a new immutable date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object fom
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such
     *
     * @return DateTimeImmutable
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    public static function createDateTimeImmutable($from, $format = null)
    {
        return DateTimeImmutable::createFromMutable(
            self::createDateTime($from, $format)
        );
    }
}
