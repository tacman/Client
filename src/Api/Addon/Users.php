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

namespace Bitbucket\Api\Addon;

use Bitbucket\Api\Addon\Users\Events;
use Bitbucket\HttpClient\Util\UriBuilder;

/**
 * The users api class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class Users extends AbstractAddonApi
{
    /**
     * @param string $username
     *
     * @return \Bitbucket\Api\Addon\Users\Events
     */
    public function events(string $username)
    {
        return new Events($this->getHttpClient(), $username);
    }
}
