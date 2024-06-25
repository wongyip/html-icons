<?php

namespace Wongyip\HTML\Icons;

/**
 * Interface based on FontAwesome, when implementing icon class for other
 * libraries, workaround of some functions are needed as styles and modifiers
 * are different between libraries.
 *
 * Individual animation method is not added to the interface, an animate()
 * method is added to maintain a more flexible way to implement animations.
 */
interface IconTagInterface
{
    /**
     * Constructor.
     *
     * @param string $name
     */
    public function __construct(string $name);

    /**
     * Set animation, put NULL to remove.
     *
     * @param string|null $animation
     * @param array|null $parameters
     * @return string|null|static
     */
    public function animate(string|null $animation, array $parameters = null): string|null|static;

//    /**
//     * Switch icon to duotone style.
//     *
//     * @return static
//     */
//    public function duotone(): static;
//
//    /**
//     * Reset the style of the icon to default.
//     *
//     * @return static
//     */
//    public function default(): static;


    /**
     * Get or set the icon's color, input empty string to unset.
     *
     * @param string|null $set
     * @return string|static|null
     */
    public function color(string $set = null): string|null|static;

    /**
     * Switch between fixed and variable width.
     *
     * @param bool $set
     * @return static
     */
    public function fixedWidth(bool $set = true): static;

    /**
     * Flip the icon on both dimensions.
     *
     * @return static
     */
    public function flipBoth(): static;

    /**
     * Flip the icon horizontally.
     *
     * @return static
     */
    public function flipHorizontal(): static;

    /**
     * Flip the icon vertically.
     *
     * @return static
     */
    public function flipVertical(): static;

    /**
     * Get or set the font or style of the icon, usage is depending on the
     * icons library used, e.g. the build in FontAwesome tag change icon style
     * with this method, i.e. regular, solid, light, etc.
     *
     * @param string|null $set
     * @return string|null|static
     */
    public function font(string $set = null): string|null|static;

    /**
     * Get or set the name of the icon.
     *
     * @param string|null $set
     * @return string|null|static
     */
    public function icon(string $set = null): string|null|static;

//    /**
//     * Switch icon to light style.
//     *
//     * @return static
//     */
//    public function light(): static;

    /**
     * Static constructor.
     *
     * @param string $name
     * @return static
     */
    public static function named(string $name): static;

//    /**
//     * Switch icon to regular style.
//     *
//     * @return static
//     */
//    public function regular(): static;

    /**
     * Set the degrees of rotation (clockwise), input 0 to reset.
     * Note that unsupported degree-input will cause a reset (no
     * rotation).
     *
     * @param int $set
     * @return static
     */
    public function rotate(int $set): static;

    /**
     * Rotate the icon by 90 degrees, clockwise.
     *
     * @return static
     */
    public function rotate180(): static;

    /**
     * Rotate the icon by 90 degrees, clockwise.
     *
     * @return static
     */
    public function rotate270(): static;

    /**
     * Rotate the icon by 90 degrees, clockwise.
     *
     * @return static
     */
    public function rotate90(): static;

    /**
     * Get or set the icon size, setter:
     *  1. Bool true for default (not set), false for unset (bool give same result).
     *  2. Input integer for literal sizing (2xs, xs, sm, lg, xl or 2xl).
     *  3. Input string for relative sizing (1 to 10, for 1x to 10x).
     *
     * Note that invalid sizing yield no size-modifier on render.
     *
     * @param bool|int|string|null $set
     * @return bool|int|string|IconTagInterface|null
     */
    public function size(bool|int|string $set = null): bool|int|string|null|static;

//    /**
//     * Switch icon to solid style.
//     *
//     * @return static
//     */
//    public function solid(): static;
}