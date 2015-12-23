<?php
namespace tests;

include __DIR__ . '/../vendor/autoload.php';

use HipChat\User;
use GuzzleHttp\Subscriber\Mock;
use GuzzleHttp\Message\Response;
use GuzzleHttp\Stream\Stream;

class UserTest extends \PHPUnit_Framework_TestCase
{
    public function testUnauthorizedException()
    {
        $client = $this->getUserClient();

        $this->setExpectedException('GuzzleHttp\Command\Exception\CommandClientException');
        $result = $client->viewUser(['id_or_email' => '123']);
    }

    public function testListUsers()
    {
        $client = $this->getUserClient();

        $mockBody = Stream::factory(json_encode([
            "items" =>  [
                [
                    "id" =>  1234567,
                    "links" =>  [
                        "self" =>  "https => //api.hipchat.com/v2/user/1234567"
                    ],
                    "mention_name" =>  "UserOne",
                    "name" =>  "User One",
                    "version" =>  "00000000"
                ],
                [
                    "id" =>  2345678,
                    "links" =>  [
                        "self" =>  "https => //api.hipchat.com/v2/user/2345678"
                    ],
                    "mention_name" =>  "UserTwo",
                    "name" =>  "User Two",
                    "version" =>  "00000000"
                ],
                [
                    "id" =>  3456789,
                    "links" =>  [
                        "self" =>  "https => //api.hipchat.com/v2/user/3456789"
                    ],
                    "mention_name" =>  "UserThree",
                    "name" =>  "User Three",
                    "version" =>  "00000000"
                ]
            ],
            "links" =>  [
                "self" =>  "https => //api.hipchat.com/v2/user"
            ],
            "maxResults" =>  100,
            "startIndex" =>  0
        ]));

        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);

        // Add the mock subscriber to the client.
        $client->getHttpClient()->getEmitter()->attach($mock);

        // List users
        $result = $client->listUsers([]);

        $this->assertEquals(200, $result['statusCode']);
        $this->assertEquals(1234567, $result['items'][0]['id']);
    }

    public function testCreateUser()
    {
        $client = $this->getUserClient();

        $mockBody = Stream::factory(json_encode([
            "entity" =>  [
                "id" =>  9876543,
                "links" =>  [
                    "self" =>  "https => //api.hipchat.com/v2/user/9876543"
                ],
                "mention_name" =>  "TestUser",
                "name" =>  "Test User",
                "version" =>  "ZV8L9NOQ"
            ],
            "id" =>  9876543,
            "links" =>  [
                "self" =>  "https => //api.hipchat.com/v2/user/9876543"
            ],
            "password" =>  "DT5qi1ewkFw8"
        ]));

        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);

        // Add the mock subscriber to the client.
        $client->getHttpClient()->getEmitter()->attach($mock);

        // List users
        $result = $client->createUser([
            'name' => 'Test User',
            'mention_name' => 'TestUser',
            'email' => 'testuser@testdomain.com',
        ]);

        $this->assertEquals(200, $result['statusCode']);
        $this->assertEquals(9876543, $result['id']);
        $this->assertEquals("DT5qi1ewkFw8",$result['password']);
    }

    public function testViewUser()
    {
        $client = $this->getUserClient();

        $mockBody = Stream::factory(json_encode([
            "created" =>  "2015-12-23T15 => 40 => 29+00 => 00",
            "email" =>  "testuser@testdomain.com",
            "group" =>  [
                "id" =>  123456,
                "links" =>  [
                    "self" =>  "https => //api.hipchat.com/v2/group/123456"
                ],
                "name" =>  "Group Name"
            ],
            "id" =>  9876543,
            "is_deleted" =>  false,
            "is_group_admin" =>  false,
            "is_guest" =>  false,
            "last_active" =>  null,
            "links" =>  [
                "self" =>  "https => //api.hipchat.com/v2/user/9876543"
            ],
            "mention_name" =>  "TestUser",
            "name" =>  "Test User",
            "photo_url" =>  "https => //secure.gravatar.com/avatar/db5370c28547613de46db31287951f6e?s=125&r=g&d=https%3A%2F%2Fwww.hipchat.com%2Fimg%2Fsilhouette_125.png",
            "presence" =>  null,
            "roles" =>  [
                "user"
            ],
            "timezone" =>  "UTC",
            "title" =>  "",
            "version" =>  "ZV8L9NOQ",
            "xmpp_jid" =>  "123456_9876543@chat.hipchat.com"
        ]));

        $mock = new Mock([
            new Response(200, [], $mockBody),
        ]);

        // Add the mock subscriber to the client.
        $client->getHttpClient()->getEmitter()->attach($mock);

        // List users
        $result = $client->viewUser([
            'id_or_email' => 'testuser@testdomain.com',
        ]);

        $this->assertEquals(200, $result['statusCode']);
        $this->assertEquals(9876543, $result['id']);
        $this->assertEquals("testuser@testdomain.com",$result['email']);
    }

    public function testUpdateUser()
    {
        $client = $this->getUserClient();

        $mockBody = Stream::factory(json_encode([]));

        $mock = new Mock([
            new Response(204, [], $mockBody),
        ]);

        // Add the mock subscriber to the client.
        $client->getHttpClient()->getEmitter()->attach($mock);

        // List users
        $result = $client->updateUser([
            'id_or_email' => 'testuser@testdomain.com',
            'name' => 'Test User',
            'mention_name' => 'TestUser',
            'email' => 'testuser@testdomain.com',
        ]);

        $this->assertEquals(204, $result['statusCode']);
    }

    public function testDeleteUser()
    {
        $client = $this->getUserClient();

        $mockBody = Stream::factory(json_encode([]));

        $mock = new Mock([
            new Response(204, [], $mockBody),
        ]);

        // Add the mock subscriber to the client.
        $client->getHttpClient()->getEmitter()->attach($mock);

        // List users
        $result = $client->deleteUser([
            'id_or_email' => 'testuser@testdomain.com',
        ]);

        $this->assertEquals(204, $result['statusCode']);
    }

    private function getUserClient($extra = [])
    {
        $config = include __DIR__ . '/config-test.php';
        $config = array_merge_recursive($config, $extra);

        return new User($config);
    }


}