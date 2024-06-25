<?php

namespace Wongyip\HTML\Icons\FontAwesome;

use Wongyip\HTML\Icons\FontAwesome;
use Wongyip\HTML\Utils\Convert;

/**
 * @method FontAwesome default()
 *
 * @method FontAwesome solid()
 * @method FontAwesome regular()
 * @method FontAwesome light()
 * @method FontAwesome duotone()
 *
 * @method FontAwesome thin()
 * @method FontAwesome sharpSolid()
 * @method FontAwesome sharpRegular()
 * @method FontAwesome sharpLight()
 * @method FontAwesome sharpThin()
 *
 * @method FontAwesome brands()
 *
 * @see FontAwesome::__call()
 * @see https://docs.fontawesome.com/web/setup/get-started
 */
trait Styles
{
    /**
     * Icon/font style NAME.
     *
     * @var string
     */
    protected string $iconStyle;

    /**
     * Available icon styles.
     *
     * @var array|string[]
     */
    private array $iconStyles = [
        'solid', 'regular', 'light', 'duotone', // FA5
        'thin', 'sharpSolid', 'sharpRegular', 'sharpLight', 'sharpThin', // FA6
        'brands' // Brand icons
    ];

    /**
     * @note This is icon-style of FontAwesome.
     *
     * @inheritdoc
     */
    public function font(string $set = null): string|null|static
    {
        if (is_null($set)) {
            return $this->iconStyle ?? self::STYLE_DEFAULT;
        }
        $this->iconStyle = in_array($set, $this->iconStyles) ? $set : self::STYLE_DEFAULT;
        return $this;
    }

    /**
     * @return array|string[]
     */
    protected function iconStyleClasses(): array
    {
        $classes = [];
        foreach (explode('-', Convert::kebab($this->font())) as $style) {
            $classes[] = 'fa-' . $style;
        }
        return $classes;
    }
}