<?php
/**
 * @file
 * DateTimeFactoryInterface.php
 *
 * @author Josh Parkinson <joshparkinson1991@gmail.com>
 */

namespace JParkinson1991\Common\Date\Factory;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;

/**
 * Class DateTimeFactoryInterface
 *
 * @package JParkinson1991\Common\Date
 */
interface DateTimeFactoryInterface
{
    /**
     * Returns a new date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTime
     */
    public function newDateTime($from, $format = null);

    /**
     * Returns a new immutable date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTimeImmutable
     */
    public function newDateTimeImmutable($from, $format = null);
}
