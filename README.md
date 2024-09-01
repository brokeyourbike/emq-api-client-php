# emq-api-client

[![Latest Stable Version](https://img.shields.io/github/v/release/brokeyourbike/emq-api-client-php)](https://github.com/brokeyourbike/emq-api-client-php/releases)
[![Total Downloads](https://poser.pugx.org/brokeyourbike/emq-api-client/downloads)](https://packagist.org/packages/brokeyourbike/emq-api-client)
[![Maintainability](https://api.codeclimate.com/v1/badges/2a2ebdf5aab58da58323/maintainability)](https://codeclimate.com/github/brokeyourbike/emq-api-client-php/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/2a2ebdf5aab58da58323/test_coverage)](https://codeclimate.com/github/brokeyourbike/emq-api-client-php/test_coverage)

EMQ API Client for PHP

## Installation

```bash
composer require brokeyourbike/emq-api-client
```

## Usage

```php
use BrokeYourBike\EMQ\Client;
use BrokeYourBike\EMQ\Interfaces\ConfigInterface;

assert($config instanceof ConfigInterface);
assert($httpClient instanceof \GuzzleHttp\ClientInterface);

$apiClient = new Client($config, $httpClient);
$apiClient->transferStatus('reference');
```

## Authors
- [Ivan Stasiuk](https://github.com/brokeyourbike) | [Twitter](https://twitter.com/brokeyourbike) | [LinkedIn](https://www.linkedin.com/in/brokeyourbike) | [stasi.uk](https://stasi.uk)

## License
[BSD-3-Clause License](https://github.com/brokeyourbike/emq-api-client-php/blob/main/LICENSE)
