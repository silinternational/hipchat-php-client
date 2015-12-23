<?php
namespace HipChat;

/**
 * Partial HipChat API client implemented with Guzzle.
 *
 * @method array viewUser(array $config = [])
 * @method array listUsers(array $config = [])
 * @method array createUser(array $config = [])
 * @method array updateUser(array $config = [])
 * @method array deleteUser(array $config = [])
 */
class User extends BaseClient
{
    /**
     * @param array $config
     */
    public function __construct(array $config = [])
    {
        // Apply some defaults.
        $config += [
            'description_path' => __DIR__ . '/descriptions/user.php',
        ];

        // Create the client.
        parent::__construct(
            $config
        );

    }
}