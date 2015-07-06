Client
------

```php
$config = ['token' => '...'];
$client = new Optimizely\Client($client);
```

Experiments
-----------

```php
// Required for some experiment requests
$client->experiments()->project(Optimizely\Model\Project $project);
$client->experiments()->projectId($projectId);
```

```php
// Available actions for experiments
$client->experiments()->list();
$client->experiments()->create(Optimizely\Model\Experiment $experiment);
$client->experiments()->get($experimentId);
$client->experiments()->update();
$client->experiments()->delete($experimentId);
$client->experiments()->results($experimentId);
$client->experiments()->stats($experimentId);
```
