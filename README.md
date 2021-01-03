# LiveFrame API - PHP SDK

Easily consume the LiveFrame API with this SDK.

## Installation

Require the package using composer:

```bash
composer require liveframe/sdk
```

## Usage

```php
$liveframe = new LiveFrame([
    'account' => $account,
    'token' => $token
]);

$liveframe->assessments->list();
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

## License
[MIT](./LICENSE.md)