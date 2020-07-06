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

namespace Bitbucket\Api\Repositories\Workspaces\Commit;
use Bitbucket\HttpClient\Util\UriBuilder;

/**
 * The comments api class.
 *
 * @author Graham Campbell <graham@alt-three.com>
 */
class Comments extends AbstractCommitApi
{
    /**
     * @param array $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function list(array $params = [])
    {
        $uri = $this->buildCommentsUri();

        return $this->get($uri, $params);
    }

    /**
     * @param array $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function create(array $params = [])
    {
        $uri = $this->buildCommentsUri();

        return $this->post($uri, $params);
    }

    /**
     * @param string $comment
     * @param array  $params
     *
     * @throws \Http\Client\Exception
     *
     * @return array
     */
    public function show(string $comment, array $params = [])
    {
        $uri = $this->buildCommentsUri($comment);

        return $this->get($uri, $params);
    }

    /**
     * Build the comments URI from the given parts.
     *
     * @param string ...$parts
     *
     * @return string
     */
    protected function buildCommentsUri(string ...$parts)
    {
        return UriBuilder::buildUri('repositories', $this->workspace, $this->repo, 'commit', $this->commit, 'comments', ...$parts);
    }
}
