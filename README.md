# Self-rendered HTML Icons

- Early stage of development, use with care.
- Developed with initial support of FontAwesome 6 icons pack.
- Extensible to support other icons font pack.

## Usage (default, FontAwesome icons)

PHP:
```php
echo
    implode("\n", [
        Icon::make('ufo')->render(),
        Icon::make('ufo')->duotone()->render(),
        Icon::make('ufo')->flipVertical()->render(),
        Icon::make('ufo')->fixedWidth()->render(),
        Icon::make('ufo')->size(5)->render(),
        Icon::make('ufo')->duotone()->flipVertical()->fixedWidth()->size(5)->render(),
    ]);
```
Output:
```html
<i class="fa-regular fa-ufo" aria-hidden="true">&zwnj;</i>
<i class="fa-duotone fa-ufo" aria-hidden="true">&zwnj;</i>
<i class="fa-regular fa-ufo fa-flip-vertical" aria-hidden="true">&zwnj;</i>
<i class="fa-regular fa-ufo fa-fw" aria-hidden="true">&zwnj;</i>
<i class="fa-regular fa-ufo fa-5x" aria-hidden="true">&zwnj;</i>
<i class="fa-duotone fa-ufo fa-5x fa-flip-vertical fa-fw" aria-hidden="true">&zwnj;</i>
```