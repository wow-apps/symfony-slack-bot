## Slack markdown

You can use [Slack markdown](https://get.slack.help/hc/en-us/articles/202288908-Format-your-messages) in your messages or SlackBot helpers can do it for you.

## To use SlackBot helpers, init it:

```php
use WowApps\SlackBotBundle\Traits\SlackMessageTrait;

class YourClass
{
    use SlackMessageTrait;

    //...
}
```

### New line

```php
echo 'Line #1' . $this->newLine() . 'Line #2';
```

> Line #1

> Line #2


### Bold text

@param string
@return string

```php
echo 'Some ' . $this->formatBold('bold') . ' text';
```

> Some **bold** text


### Italic text

@param string
@return string

```php
echo 'Some ' . $this->formatItalic('italic') . ' text';
```

> Some _italic_ text


### Strike thought text

@param string
@return string

```php
echo 'Some ' . $this->formatStrikeThought('strike thought') . ' text';
```


### Clickable link

@param string $title
@param string $url
@return string

```php
echo 'Check page '
    . $this->formatLink(
        'SlackBot for Symfony 3',
        'https://github.com/wow-apps/symfony-slack-bot'
    )
;
```

> Check page [SlackBot for Symfony 3](https://github.com/wow-apps/symfony-slack-bot)


### Unordered list

@param array
@return string

```php
echo $this->formatListMarker([
        'List element #1',
        'List element #2',
        'List element #3'
    ])
;
```

> * List element #1
> * List element #2
> * List element #3



### Ordered list

@param array
@return string

```php
echo $this->formatListNumeric([
        'List element #1',
        'List element #2',
        'List element #3'
    ])
;
```

> 1. List element #1
> 1. List element #2
> 1. List element #3


### Multilines

@param array
@return string

```php
echo $this->inlineMultilines([
        'Line #1',
        'Line #2',
        'Line #3'
    ])
;
```

> Line #1
> Line #2
> Line #3


### Code

@param array
@return string

```php
echo $this->formatCode([
        '<?php',
        '',
        '$text = "text";',
        'echo $text;'
    ])
;
```

> ```
> <?php
>
> $text = "text";
> echo $text;
> ```


### Escape special characters

@param string
@return string

```php
echo $this->escapeCharacters('a > b & b < c');
```

> a &amp;gt; b &amp;amp; b &amp;lt; c
