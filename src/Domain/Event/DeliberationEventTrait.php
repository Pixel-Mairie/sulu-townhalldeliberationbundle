<?php

declare(strict_types=1);

namespace Pixel\TownHallDeliberationBundle\Domain\Event;

use Pixel\TownHallDeliberationBundle\Entity\Deliberation;

trait DeliberationEventTrait
{
    private Deliberation $deliberation;

    /**
     * @var array<mixed>
     */
    private array $payload;

    /**
     * @param array<mixed> $payload
     */
    public function initialize(Deliberation $deliberation, array $payload): void
    {
        $this->deliberation = $deliberation;
        $this->payload = $payload;
    }

    public function getDeliberation(): Deliberation
    {
        return $this->deliberation;
    }

    public function getResourceKey(): string
    {
        return Deliberation::RESOURCE_KEY;
    }

    public function getResourceId(): string
    {
        return (string) $this->deliberation->getId();
    }

    public function getResourceTitle(): ?string
    {
        return $this->deliberation->getTitle();
    }

    public function getResourceSecurityContext(): ?string
    {
        return Deliberation::SECURITY_CONTEXT;
    }

    public function getEventPayload(): ?array
    {
        return $this->payload;
    }
}
