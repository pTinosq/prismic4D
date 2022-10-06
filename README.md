# Prismic4D - Prismic For Dummies

### A very minimalist PHP library for interacting with the Prismic.io CDN.

---

## Installation

### Composer

```bash
composer require pTinosq/Prismic4D
```

## Usage

```php
<?php
require_once 'vendor/autoload.php';

use pTinosq\Prismic4D;

$api = new Prismic4D\API();
$api->setProjectName('my-project-name');
$api->setAccessToken('my-access-token');

$ref = $api->getRef();
$document = $api->getDocument($ref, 'my-document-id');
```

## Contributing

1. Fork it
2. Create your feature branch (`git checkout -b my-new-feature`)
3. Commit your changes (`git commit -am 'Add some feature'`)
4. Push to the branch (`git push origin my-new-feature`)
5. Create new Pull Request

## Credits

- [Prismic.io](https://prismic.io)
