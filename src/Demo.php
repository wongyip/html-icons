<?php /** @noinspection ALL */

namespace Wongyip\HTML\Icons;

use Throwable;
use Wongyip\HTML\Anchor;
use Wongyip\HTML\Button;
use Wongyip\HTML\Comment;
use Wongyip\HTML\Demo\DialogBox;
use Wongyip\HTML\Div;
use Wongyip\HTML\Form;
use Wongyip\HTML\Input;
use Wongyip\HTML\Label;
use Wongyip\HTML\Option;
use Wongyip\HTML\RawHTML;
use Wongyip\HTML\Select;
use Wongyip\HTML\Supports\ContentsCollection;
use Wongyip\HTML\Table;
use Wongyip\HTML\Tag;
use Wongyip\HTML\TagAbstract;
use Wongyip\HTML\TBody;
use Wongyip\HTML\TD;
use Wongyip\HTML\Textarea;
use Wongyip\HTML\TH;
use Wongyip\HTML\THead;
use Wongyip\HTML\TR;
use Wongyip\HTML\Utils\Convert;
use Wongyip\HTML\Utils\Output;

class Demo
{
    public function __construct(string $code, string $output)
    {
        echo sprintf("\nCode: \n\n%s\n\nOutput:\n\n%s\n", $code, $output);
    }

    /**
     * @return void
     */
    public static function default(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->render();
        CODE;

        new Demo(
            $code,
            Icon::make('ufo')->render()
        );
    }

    /**
     * @return void
     */
    public static function advanced(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->render();
        Icon::make('ufo')->duotone()->render();
        Icon::make('ufo')->flipVertical()->render();
        Icon::make('ufo')->fixedWidth()->render();
        Icon::make('ufo')->size(5)->render();
        Icon::make('ufo')->duotone()->flipVertical()->fixedWidth()->render();
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->render(),
                Icon::make('ufo')->duotone()->render(),
                Icon::make('ufo')->flipVertical()->render(),
                Icon::make('ufo')->fixedWidth()->render(),
                Icon::make('ufo')->size(5)->render(),
                Icon::make('ufo')->duotone()->flipVertical()->fixedWidth()->size(5)->render(),
            ])
        );
    }

    /**
     * @return void
     */
    public static function animation(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->beat()->render();
        Icon::make('ufo')->beatFade()->render();
        Icon::make('ufo')->bounce()->render();
        Icon::make('ufo')->fade()->render();
        Icon::make('ufo')->flip()->render();
        Icon::make('ufo')->pulse()->render();
        Icon::make('ufo')->shake()->render();
        Icon::make('ufo')->spin()->render();
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->beat()->render(),
                Icon::make('ufo')->beatFade()->render(),
                Icon::make('ufo')->bounce()->render(),
                Icon::make('ufo')->fade()->render(),
                Icon::make('ufo')->flip()->render(),
                Icon::make('ufo')->pulse()->render(),
                Icon::make('ufo')->shake()->render(),
                Icon::make('ufo')->spin()->render(),
            ])
        );
    }

    /**
     * @return void
     */
    public static function rotate(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->rotate90()->render();                    // 90-degree clockwise.
        Icon::make('ufo')->rotate(90)->render();                    // Same.
        Icon::make('ufo')->rotate(123)->render();                   // Not supported.
        Icon::make('ufo')->rotate180()->flipHorizontal()->render(); // Flip and rotate overrides each other.
        Icon::make('ufo')->flipVertical()->rotate(270)->render();   // Another override.
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->rotate90()->render(),
                Icon::make('ufo')->rotate(90)->render(), // Same
                Icon::make('ufo')->rotate(123)->render(), // Not supported
                Icon::make('ufo')->rotate180()->flipHorizontal()->render(), // Flip and rotate overrides each other.
                Icon::make('ufo')->flipVertical()->rotate(270)->render(),   // Another override.
            ])
        );
    }

    /**
     * @return void
     */
    public static function size(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->size('xs')->render();           // Relative sizing (2xs, xs, sm, lg, xl or 2xl).
        Icon::make('ufo')->size(2)->render();              // Literal sizing, 1 to 10.
        Icon::make('ufo')->size('2x')->render();           // Same.
        Icon::make('ufo')->size(5)->size(false)->render(); // Reset (unset).
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->size('xs')->render(),
                Icon::make('ufo')->size(2)->render(),
                Icon::make('ufo')->size('2x')->render(),
                Icon::make('ufo')->size(5)->size(false)->render(),
            ])
        );
    }

    /**
     * @return void
     */
    public static function style(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->light()->render();
        Icon::make('ufo')->sharpSolid()->render();
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->light()->render(),
                Icon::make('ufo')->sharpSolid()->render(),
            ])
        );
    }

    /**
     * @return void
     */
    public static function spin(): void
    {
        $code = <<<CODE
        Icon::make('ufo')->spin()->render();                   // Le spinning UFO.
        Icon::make('ufo')->spin()->spin(false)->render();      // Stop the UFO from spinning.
        Icon::make('ufo')->flipHorizontal()->spin()->render(); // Spin supercede rotation and flip.
        /**
         * The last one prints both flip and spin modifiers, but only spin will take effect.
         */  
        CODE;
        new Demo(
            $code,
            implode("\n",[
                Icon::make('ufo')->spin()->render(),
                Icon::make('ufo')->spin()->spin(false)->render(),
                Icon::make('ufo')->flipHorizontal()->spin()->render(),
            ])
        );
    }
}

