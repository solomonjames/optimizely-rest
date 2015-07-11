Client
------

```php
$config = ['token' => '...'];
$client = new Optimizely\Client($client);
```

Experiments
-----------

```php
// Available actions for experiments
$client->experiments()->listAll($projectId);
$client->experiments()->create($projectId, array $data);
$client->experiments()->get($experimentId);
$client->experiments()->update($experimentId, array $data);
$client->experiments()->delete($experimentId);
$client->experiments()->results($experimentId);
$client->experiments()->stats($experimentId);
```
