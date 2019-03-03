# Usage {docsify-ignore}

## Service injection {docsify-ignore}

<!-- tabs:start -->

#### ** Autowiring **
```php
<?php

namespace App;

use WowApps\SlackBundle\Service\SlackBot;

class Foo
{
    /** @var SlackBot */
    private $slackBot;
    
    /**
     * @param SlackBot $slackBot
     */
    public function __construct(SlackBot $slackBot)
    {
        $this->slackBot = $slackBot;
    }
}
```

#### ** Getting from container **
```php
/** @var SlackBot $slackBot */
$slackBot = $this->getContainer()->get('wowapps.slackbot');
```

#### ** As argument **
```yaml
services:
    App\Foo:
        public: false
        arguments:
            - '@wowapps.slackbot'
```

<!-- tabs:end -->