<?php /** @noinspection PhpUndefinedConstantInspection */

namespace Wongyip\HTML\Icons;

class Icon
{
    const DEFAULT_MAKER_CLASS = FontAwesome::class;

    /**
     * @param string $name
     * @param string|null $makerClass
     * @return IconTagInterface
     */
    public static function make(string $name, string $makerClass = null): IconTagInterface
    {
        /**
         * @var IconTagInterface|FontAwesome $makerClass
         */
        $makerClass = $makerClass ?? (defined('HTML_ICON_MAKER_CLASS') ? HTML_ICON_MAKER_CLASS : self::DEFAULT_MAKER_CLASS);
        return $makerClass::named($name);
    }
}