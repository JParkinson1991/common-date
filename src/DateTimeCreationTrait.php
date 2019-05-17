<?php
/**
 * @file
 * DateTimeCreationTrait.php
 *
 * @author Josh Parkinson <joshparkinson1991@gmail.com>
 */

namespace JParkinson1991\Common\Date;

use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Exception;
use InvalidArgumentException;
use JParkinson1991\Common\Date\Factory\DateTimeFactory;

/**
 * Trait DateTimeCreationTrait
 *
 * @package JParkinson1991\Common\Date
 */
trait DateTimeCreationTrait
{
    /**
     * Creates and returns a date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTime
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    protected function toDateTime($from, $format = null)
    {
        return self::toDateTimeStatic($from, $format);
    }

    /**
     * Creates and returns an immutable date time object from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTimeImmutable
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    protected function toDateTimeImmutable($from, $format = null)
    {
        return self::toDateTimeImmutableStatic($from, $format);
    }

    /**
     * Statically creates and returns a date time from the given parameters
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTime
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    protected static function toDateTimeStatic($from, $format = null)
    {
        return DateTimeFactory::createDateTime($from, $format);
    }

    /**
     * Statically creates and returns an immutable date time object from the given arguments
     *
     * @param DateTimeInterface|string|int $from
     *     The value in which to create the date time object from.
     * @param null|string $format
     *     The date format string.
     *     If provided it will be assumed that $from is a string date representation and handled as such.
     *
     * @return DateTimeImmutable
     *
     * @throws Exception
     * @throws InvalidArgumentException
     */
    protected static function toDateTimeImmutableStatic($from, $format = null)
    {
        return DateTimeFactory::createDateTimeImmutable($from, $format);
    }
}
