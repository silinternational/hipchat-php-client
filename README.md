# ⛔️ This repository is no longer maintained. ⛔️

# hipchat-php-client
PHP client to interact with the HipChat v2 API.

We're slowly building out this client as we need the functionality. Initially we only need it for adding users to groups.

This client is built on top of [Guzzle](http://docs.guzzlephp.org/en/latest/index.html), the PHP HTTP Client.
Guzzle has a simple way to create API clients by describing the API in a Swagger-like format without the need to implement 
every method yourself. So adding support for more HipChat APIs is relatively simple. If you want to submit a pull request
to add another feature, please do. If you don't know how to do that, ask us and we might be able to add it in for you.

# HipChat API Docs #
https://www.hipchat.com/docs/apiv2

# HipChat API Authentication #
HipChat uses OAuth tokens for authentication, you can create tokens by going to https://silintl.hipchat.com/account/api

# Install #
Installation is simple with [Composer](https://getcomposer.org/). Add ```"silinternational/hipchat-php-client": "dev-master"``` to your ```composer.json``` file and update.

# Usage #
Example:
```php
<?php

use HipChat\UserClient;

$client = new UserClient([
  
]);

$user = $client->createUser([
    'name' => 'Test User',
    'mention_name' => 'TestUser',
    'email' => 'testuser@testdomain.com',
]);

var_dump($user);

array(4) {
  'entity' =>
  array(5) {
    'id' =>
    int(9876543)
    'links' =>
    array(1) {
      'self' =>
      string(42) "https => //api.hipchat.com/v2/user/9876543"
    }
    'mention_name' =>
    string(8) "TestUser"
    'name' =>
    string(9) "Test User"
    'version' =>
    string(8) "ZV8L9NOQ"
  }
  'id' =>
  int(9876543)
  'links' =>
  array(1) {
    'self' =>
    string(42) "https => //api.hipchat.com/v2/user/9876543"
  }
  'password' =>
  string(12) "DT5qi1ewkFw8"
}


```

## Guzzle Service Client Notes ##
- Tutorial on developing an API client with Guzzle Web Services: http://www.phillipshipley.com/2015/04/creating-a-php-nexmo-api-client-using-guzzle-web-service-client-part-1/
- Presentation by Jeremy Lindblom: https://speakerdeck.com/jeremeamia/building-web-service-clients-with-guzzle-1
- Example by Jeremy Lindblom: https://github.com/jeremeamia/sunshinephp-guzzle-examples
- Parameter docs in source comments: https://github.com/guzzle/guzzle-services/blob/master/src/Parameter.php
