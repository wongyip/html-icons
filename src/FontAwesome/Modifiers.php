<?php

namespace Wongyip\HTML\Icons\FontAwesome;

/**
 * Other modifiers.
 */
trait Modifiers
{
    /**
     * Modifiers including fixed-width, flip, pulse, rotate, spin, and size.
     *
     * @var array|string[]
     */
    protected array $modifiers = [];
    /**
     * List of CSS classes of flip and rotate modifiers.
     *
     * @var array|string[]
     * @see https://docs.fontawesome.com/web/style/rotate
     */
    private array $rotations = [
        'fa-flip-both', 'fa-flip-horizontal', 'fa-flip-vertical', // Flip
        'fa-rotate-180', 'fa-rotate-270', 'fa-rotate-90', // Rotate
    ];
    /**
     * List of supported sizing modifiers.
     *
     * @var array|string[]
     * @see https://docs.fontawesome.com/web/style/size/
     */
    private array $sizes = [
        'fa-2xs', 'fa-xs', 'fa-sm', 'fa-lg', 'fa-xl', 'fa-2xl', // Relative sizing
        'fa-1x', 'fa-2x', 'fa-3x', 'fa-4x', 'fa-5x', 'fa-6x', 'fa-7x', 'fa-8x', 'fa-9x', 'fa-10x', // Literal sizing
    ];

    /**
     * Push a list of modifier classes onto the end of the modifiers array, if
     * an input class is already in the modifier array, it will be removed and
     * then push again onto the end of the array.
     *
     * E.g. When appending 'c2' and 'c4' to existing classes ['c1', 'c2', 'c3'],
     * the outcome will be ['c1', 'c3', 'c2', 'c4'].
     *
     * @param string ...$modifiers
     * @return static
     */
    public function modifierAdd(string ...$modifiers): static
    {
        if (!empty($modifiers)) {
            $this->modifierRemove(...$modifiers);
            array_push($this->modifiers, ...$modifiers);
        }
        return $this;
    }

    /**
     * Remove a list of modifier classes from the modifiers array.
     *
     * @param string|array|string[] $modifiers
     * @return static
     */
    public function modifierRemove(string ...$modifiers): static
    {
        if (!empty($modifiers)) {
            $this->modifiers = array_diff($this->modifiers, $modifiers);
        }
        return $this;
    }

    /**
     * @inheritdoc
     */
    public function flipBoth(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-flip-both');
    }

    /**
     * @inheritdoc
     */
    public function flipHorizontal(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-flip-horizontal');
    }

    /**
     * @inheritdoc
     */
    public function flipVertical(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-flip-vertical');
    }

    /**
     * @inheritdoc
     */
    public function fixedWidth(bool $set = true): static
    {
        return $set ? $this->classAppend('fa-fw') : $this->classRemove('fa-fw');
    }

    /**
     * @inheritdoc
     */
    public function rotate(int $set): static
    {
        if (!in_array($set, [0, 90, 180, 270])) {
            /**
             * @todo Custom Rotation
             * <i class="fa-solid fa-snowboarding fa-rotate-by" style="--fa-rotate-angle: 45deg;" ></i>
             */
            error_log(sprintf('Custom rotation by %d-degree is not supported, yet. Reset to 0.', $set));
            $set = 0;
        }
        if ($set > 0) {
            $rotateMethod = 'rotate' . $set;
            return $this->$rotateMethod();
        }
        return $this->modifierRemove(...$this->rotations);
    }

    /**
     * @inheritdoc
     */
    public function rotate180(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-rotate-180');
    }

    /**
     * @inheritdoc
     */
    public function rotate270(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-rotate-270');
    }

    /**
     * @inheritdoc
     */
    public function rotate90(): static
    {
        return $this->modifierRemove(...$this->rotations)->modifierAdd('fa-rotate-90');
    }

    /**
     * @inheritdoc
     */
    public function size(bool|int|string $set = null): bool|int|string|null|static
    {
        // Reset
        if (is_null($set)) {
            return (isset($this->iconSize) && !is_bool($this->iconSize)) ? $this->iconSize : null;
        }
        $this->iconSize = $set;
        return $this;
    }
}