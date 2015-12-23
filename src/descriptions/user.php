<?php return [
    'baseUrl' => 'https://api.hipchat.com',
    'apiVersion' => 'v2',
    'operations' => [
        'ViewUser' => [
            'httpMethod' => 'GET',
            'uri' => '/{ApiVersion}/user/{id_or_email}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'id_or_email' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
        'ListUsers' => [
            'httpMethod' => 'GET',
            'uri' => '/{ApiVersion}/user',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'start-index' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'query',
                ],
                'max-results' => [
                    'required' => false,
                    'type' => 'integer',
                    'location' => 'query',
                ],
                'include-guests' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'query',
                    'enum' => ['true','false'],
                ],
                'include-deleted' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'query',
                    'enum' => ['true','false'],
                ],
            ]
        ],
        'CreateUser' => [
            'httpMethod' => 'POST',
            'uri' => '/{ApiVersion}/user',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'name' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'roles' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                    'enum' => ['owner','admin','moderator','user'],
                ],
                'title' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'mention_name' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'is_group_admin' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                    'enum' => ['true','false'],
                ],
                'timezone' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
            ]
        ],
        'UpdateUser' => [
            'httpMethod' => 'PUT',
            'uri' => '/{ApiVersion}/user/{id_or_email}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'id_or_email' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'name' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'roles' => [
                    'required' => false,
                    'type' => 'array',
                    'location' => 'json',
                    'enum' => ['owner','admin','moderator','user'],
                ],
                'title' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'mention_name' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'is_group_admin' => [
                    'required' => false,
                    'type' => 'boolean',
                    'location' => 'json',
                    'enum' => ['true','false'],
                ],
                'timezone' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'password' => [
                    'required' => false,
                    'type' => 'string',
                    'location' => 'json',
                ],
                'email' => [
                    'required' => true,
                    'type' => 'string',
                    'location' => 'json',
                ],
            ]
        ],
        'DeleteUser' => [
            'httpMethod' => 'DELETE',
            'uri' => '/{ApiVersion}/user/{id_or_email}',
            'responseModel' => 'Result',
            'parameters' => [
                'ApiVersion' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
                'id_or_email' => [
                    'required' => true,
                    'type'     => 'string',
                    'location' => 'uri',
                ],
            ]
        ],
    ],
    'models' => [
        'Result' => [
            'type' => 'object',
            'properties' => [
                'statusCode' => ['location' => 'statusCode'],
            ],
            'additionalProperties' => [
                'location' => 'json'
            ]
        ]
    ]

];
