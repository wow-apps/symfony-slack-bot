# Installation

> [!NOTE|label:Requirements]
> PHP 7.0+;
>
> Symfony 3.0+;
>
> Guzzle Client 6.0+

<!-- tabs:start -->

#### ** Symfony 4 **

### Step 1: Download the Bundle {docsify-ignore}

```bash
composer require wow-apps/symfony-slack-bot 
```

or add entry to your `composer.json` file:
```json
"require": {
        "wow-apps/symfony-slack-bot": "^4.0"
}
```

#### ** Symfony 3 **

### Step 1: Download the Bundle {docsify-ignore}

```bash
composer require wow-apps/symfony-slack-bot 
```

or add entry to your `composer.json` file:
```json
"require": {
        "wow-apps/symfony-slack-bot": "^4.0"
}
```

### Step 2: Enable the Bundle {docsify-ignore}
Edit your `app/AppKernel.php` file
```php
public function registerBundles()
{
    $bundles = array(
        // ...
        new WowApps\SlackBundle\WowAppsSlackBundle(),
    );

    // ...

    return $bundles
}
```

<!-- tabs:end -->
