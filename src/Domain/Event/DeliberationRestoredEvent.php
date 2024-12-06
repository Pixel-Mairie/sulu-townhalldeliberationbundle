<?php

declare(strict_types=1);

namespace Pixel\TownHallDeliberationBundle\Domain\Event;

use Pixel\TownHallDeliberationBundle\Entity\Deliberation;
use Sulu\Bundle\ActivityBundle\Domain\Event\DomainEvent;

class DeliberationRestoredEvent extends DomainEvent
{
    use DeliberationEventTrait;

    /**
     * @param array<mixed> $payload
     */
    public function __construct(Deliberation $deliberation, array $payload)
    {
        parent::__construct();
        $this->initialize($deliberation, $payload);
    }

    public function getEventType(): string
    {
        return 'restored';
    }
}
