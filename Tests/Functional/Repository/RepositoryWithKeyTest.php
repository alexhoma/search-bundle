<?php

/*
 * This file is part of the Search PHP Bundle.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author PuntMig Technologies
 */

declare(strict_types=1);

namespace Puntmig\Search\Tests\Repository;

use Mmoreram\BaseBundle\Kernel\BaseKernel;
use Mmoreram\BaseBundle\Tests\BaseFunctionalTest;
use Symfony\Component\HttpKernel\KernelInterface;

use Puntmig\Search\PuntmigSearchBundle;

/**
 * File header placeholder.
 */
class RepositoryWithKeyTest extends BaseFunctionalTest
{
    /**
     * Get kernel.
     *
     * @return KernelInterface
     */
    protected static function getKernel() : KernelInterface
    {
        return new BaseKernel([
            PuntmigSearchBundle::class,
        ], [
            'puntmig_search' => [
                'endpoint' => 'http://example.com',
                'api_key' => '12345',
            ],
        ]);
    }

    /**
     * Test api key value.
     */
    public function testApiKeyValue()
    {
        $this->assertEquals(
            '12345',
            $this->get('search_bundle.http_repository')->getKey()
        );
    }
}
