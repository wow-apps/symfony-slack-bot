# Helpers {docsify-ignore}

?> You can use [Slack markdown](https://get.slack.help/hc/en-us/articles/202288908-Format-your-messages) in your messages or SlackBot helpers can do it for you.

## Initialize helpers {docsify-ignore}

```php
<?php

namespace App;

use WowApps\SlackBundle\Traits\SlackMessageTrait;

class Foo
{
    use SlackMessageTrait;
    
    //...
}
```

---

### New line
```php
$slackBotMessage->setText(
    'Line #1' . $this->newLine() . 'Line #2'
);
```
**Result:**
> Line #1
>
> Line #2

---

### Bold text
```php
$slackBotMessage->setText(
    'Some ' . $this->formatBold('bold') . ' text'
);
```
**Result:**
> Some **bold** text

---

### Italic text
```php
$slackBotMessage->setText(
    'Some ' . $this->formatItalic('italic') . ' text'
);
```
**Result:**
> Some _italic_ text

---

### Strike thought text
```php
$slackBotMessage->setText(
    'Some ' . $this->formatStrikeThought('strike thought') . ' text'
);
```
**Result:**

<blockquote>
Some <strike>strike thought</strike> text
</blockquote>

---

### Clickable link
```php
$slackBotMessage->setText(
    sprintf(
        'Fork me on %s',
        $this->formatLink(
            'GitHub',
            'https://github.com/wow-apps/symfony-slack-bot'
        )
    )
);
```
**Result:**
> Fork me on [GitHub](https://github.com/wow-apps/symfony-slack-bot)

---

### Unordered list
```php
$slackBotMessage->setText(
    $this->formatListMarker(
        [
            'List element #1',
            'List element #2',
            'List element #3'
        ]
    )
);
```
**Result:**
> * List element #1  
> * List element #2  
> * List element #3

---

### Ordered list
```php
$slackBotMessage->setText(
    $this->formatListNumeric(
        [
            'List element #1',
            'List element #2',
            'List element #3'
        ]
    )
);
```
**Result:**
> 1. List element #1  
> 1. List element #2  
> 1. List element #3

---

### Multilines
```php
$slackBotMessage->setText(
    $this->inlineMultilines(
        [
            'Line #1',
            'Line #2',
            'Line #3'
        ]
    )
);
```
**Result:**
> Line #1  
> Line #2  
> Line #3

---

### Code
```php
$slackBotMessage->setText(
    $this->formatCode(
        [
            '<?php',
            '',
            '$text = "text";',
            'echo $text;'
        ]
    )
);
```
**Result:**
> ```
> <?php  
>   
> $text = "text";  
> echo $text;  
> ```

---

### Escape special characters
```php
$slackBotMessage->setText(
    $this->escapeCharacters('a > b & b < c')
);
```
**Result:**
> a &amp;gt; b &amp;amp; b &amp;lt; c
