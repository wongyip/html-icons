<?php

namespace Wongyip\HTML\Icons;

use Wongyip\HTML\Icons\FontAwesome\Animations;
use Wongyip\HTML\Icons\FontAwesome\Modifiers;
use Wongyip\HTML\Icons\FontAwesome\Styles;
use Wongyip\HTML\Interfaces\ContentsOverride;
use Wongyip\HTML\RawHTML;
use Wongyip\HTML\Supports\ContentsCollection;
use Wongyip\HTML\TagAbstract;
use Wongyip\HTML\Traits\NoAddAttrs;
use Wongyip\HTML\Utils\Convert;

/**
 * FontAwesome 6.x Icon Maker.
 *
 * Render and \<i>\&zwnj;\</i> tag, where tag contents are ignores.
 *
 * Limitations:
 *  - Custom (degrees of) rotation is not supported.
 *  - Combining of rotation and flipping is not supported.
 *  - Animation utilities (CSS styles) is not supported.
 */
class FontAwesome extends TagAbstract implements ContentsOverride, IconTagInterface
{
    use Animations, Modifiers, NoAddAttrs, Styles;

    const STYLE_DEFAULT = 'regular';

    /**
     * @var string
     */
    protected string $iconColor;
    /**
     * @var string
     */
    protected string $iconName;
    /**
     * @var bool|int|string
     */
    protected bool|int|string $iconSize;

    /**
     * @inheritdoc
     */
    protected string $tagName = 'i';

    /**
     * A renderable FontAwesome 6 icon tag.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        parent::__construct();
        $this->icon($name);
    }

    /**
     * @inheritdoc
     */
    public function __call(string $name, array $arguments)
    {
        // Animation
        if (in_array($name, $this->animations)) {
            return $this->animate($name, ...$arguments);
        }
        
        /**
         * Get or set font/style.
         * @todo Improvement needed for cross-library support.
         */
        if (in_array($name, $this->iconStyles)) {
            return $this->font($name);
        }

        // Fallback to TagAbstract.
        return parent::__call($name, $arguments);
    }

    /**
     * @inheritdoc
     */
    public function color(string|bool $set = null): string|null|static
    {
        if (is_null($set)) {
            return $this->iconColor ?? null;
        }
        $this->iconColor = is_string($set) ? $set : ($set ? $this->colorAuto() : '');
        return $this;
    }

    /**
     * @return string
     */
    private function colorAuto(): string
    {
        return match ($this->iconName) {
            'file-excel'      => '#107C41',
            'file-pdf'        => '#F20F00',
            'file-powerpoint' => '#C43E1C',
            'file-word'       => '#185ABD',
            default           => '#333',
        };
    }

    /**
     * @inheritdoc
     */
    public function icon(string $set = null): string|null|static
    {
        if (is_null($set)) {
            return $this->iconName;
        }
        $this->iconName = $set;
        return $this;
    }

    /**
     * @inheritdoc
     */
    public static function named(string $name): static
    {
        return new static($name);
    }

    /**
     * @inheritDoc
     */
    public function attributes(array $attributes = null, bool $withDataAttrs = null) : array|static
    {
        // Extended getter.
        if (is_null($attributes)) {
            $additions = [
                'aria-hidden' => 'true',
            ];
            return array_merge(parent::attributes(null, $withDataAttrs), $additions);
        }

        // Setter fallback to parent.
        return parent::attributes($attributes, $withDataAttrs);
    }

    /**
     * @inheritdoc
     */
    protected function classesHook(array $classes): array
    {
        // Style
        $base = $this->iconStyleClasses();

        // Name
        $base[] = 'fa-' . $this->iconName;

        // Size
        if ($size = $this->size()) {
            $class = is_int($size) ? sprintf('fa-%dx', $size) : "fa-$size";
            if (in_array($class, $this->sizes)) {
                $base[] = $class;
            }
            else {
                error_log(sprintf('Sizing modifier: %s is not supported by FontAwesome, reset to none.', $size));
            }
        }

        return array_merge(
            $base,
            $this->modifiers,
            $classes // Customized
        );
    }

    /**
     * FA icon should have no contents, a \&zwnj; is printed to prevent the tag
     * being stripped by some HTML editors / filterers.
     *
     * @return ContentsCollection
     */
    public function contentsOverride(): ContentsCollection
    {
        return ContentsCollection::of($this)
            ->contents(RawHTML::ZWNJ());
    }

    /**
     * @inheritdoc
     */
    protected function stylesHook(array $declarations): array
    {
        $additions = [];
        if ($color = $this->color()) {
            $additions[] = "color: $color";
        }
        return array_merge(
            $declarations,
            $additions,
        );
    }
}