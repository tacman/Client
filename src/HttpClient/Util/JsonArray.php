<?php

declare(strict_types=1);

/*
 * This file is part of Bitbucket API Client.
 *
 * (c) Graham Campbell <graham@alt-three.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Bitbucket\HttpClient\Util;

use Bitbucket\Exception\RuntimeException;

/**
 * The is the JSON array helper class.
 *
 * @internal
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
final class JsonArray
{
    /**
     * Decode a JSON string into a PHP array.
     *
     * @param string $json
     *
     * @throws \Bitbucket\Exception\RuntimeException
     *
     * @return array
     */
    public static function decode(string $json)
    {
        /** @var scalar|array */
        $data = \json_decode($json, true);

        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new RuntimeException(sprintf('json_decode error: %s', \json_last_error_msg()));
        }

        if (!\is_array($data)) {
            throw new RuntimeException(sprintf('json_decode error: Expected JSON of type array, %s given.', \get_debug_type($data)));
        }

        return $data;
    }

    /**
     * Encode a PHP array into a JSON string.
     *
     * @param array $value
     *
     * @throws \Bitbucket\Exception\RuntimeException
     *
     * @return string
     */
    public static function encode(array $value)
    {
        $json = \json_encode($value);

        if (\JSON_ERROR_NONE !== \json_last_error()) {
            throw new RuntimeException(sprintf('json_encode error: %s', \json_last_error_msg()));
        }

        /** @var string */
        return $json;
    }
}
