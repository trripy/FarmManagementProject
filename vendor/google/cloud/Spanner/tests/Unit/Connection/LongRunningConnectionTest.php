<?php
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace Google\Cloud\Spanner\Tests\Unit\Connection;

use Google\Cloud\Spanner\Connection\ConnectionInterface;
use Google\Cloud\Spanner\Connection\LongRunningConnection;
use PHPUnit\Framework\TestCase;

/**
 * @group spanner
 * @group spanneradmin
 */
class LongRunningConnectionTest extends TestCase
{
    private $connection;
    private $lro;

    public function setUp()
    {
        $this->connection = $this->prophesize(ConnectionInterface::class);
        $this->lro = \Google\Cloud\Core\Testing\TestHelpers::stub(LongRunningConnection::class, [
            $this->connection->reveal()
        ]);
    }

    /**
     * @dataProvider methodProvider
     */
    public function testMethods($methodName, $proxyName, $args)
    {
        $this->connection->$proxyName($args)
            ->shouldBeCalled()
            ->willReturn($args);

        $this->lro->___setProperty('connection', $this->connection->reveal());

        $res = $this->lro->$methodName($args);
        $this->assertEquals($args, $res);
    }

    public function methodProvider()
    {
        $args = ['foo' => 'bar'];

        return [
            ['get', 'getOperation', $args],
            ['cancel', 'cancelOperation', $args],
            ['delete', 'deleteOperation', $args],
            ['operations', 'listOperations', $args]
        ];
    }
}
