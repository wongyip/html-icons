<?php

namespace Wongyip\HTML\Icons\FontAwesome;

use Wongyip\HTML\Icons\FontAwesome;

/**
 * Animations
 *
 * @todo Implements animation utilities, utilizing the $parameters argument.
 *
 * @method FontAwesome beat()
 * @method FontAwesome beatFade()
 * @method FontAwesome bounce()
 * @method FontAwesome fade()
 * @method FontAwesome flip()
 * @method FontAwesome pulse()
 * @method FontAwesome shake()
 * @method FontAwesome spin()
 */
trait Animations
{
    /**
     * Current animation set.
     *
     * @var string
     */
    protected string $animation;
    /**
     * Supported animations.
     *
     * @var array|string[]
     * @see https://docs.fontawesome.com/web/style/animate
     */
    protected array $animations = [
        'beat', 'beatFade', 'bounce', 'fade', 'flip', 'pulse', 'shake', 'spin'
    ];
    /**
     * Parameters of the current animation.
     *
     * @var array
     */
    protected array $animationParameters;

    /**
     * @inheritdoc
     */
    public function animate(string|null $animation, array $parameters = null): string|null|static
    {
        if (is_null($animation)) {
            return $this->animation ?? null;
        }

        if (in_array($animation, $this->animations)) {

            $this->modifierAdd("fa-$animation");
        }
        return $this;
    }
}