<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast\Handlers;

use Midpaint\Telegram\Types\Entity\Entity;
use Midpaint\Telegram\Services\TypeCast\AbstractTypeHandler;
use Midpaint\Telegram\Types\Entity\Length;
use Midpaint\Telegram\Types\Entity\Offset;
use Midpaint\Telegram\Types\Entity\Type;
use Midpaint\Telegram\Types\User\FirstName;
use Midpaint\Telegram\Types\User\ID;
use Midpaint\Telegram\Types\User\LastName;
use Midpaint\Telegram\Types\User\User;
use Midpaint\Telegram\Types\User\Username;

final class EntitiesHandler extends AbstractTypeHandler
{
    public function handle(array $data): array
    {
        if (isset($data[$this->field()])) {
            $data[$this->field()] = $this->cast(
                data: $data[$this->field()]
            );
        }

        return parent::handle($data);
    }

    /**
     * @return array<Entity>
     */
    protected function cast(array $data): array
    {
        return array_map(function (array $element) {
            return new Entity(
                Type::tryFrom($element['type']),
                new Offset($element['offset']),
                new Length($element['length']),
                !isset($element['user']) ? null : new User(
                    new ID($element['id']),
                    new FirstName($element['first_name'] ?? null),
                    new LastName($element['last_name'] ?? null),
                    new Username($element['username'] ?? null),
                    $element['is_bot']
                )
            );
        }, $data);
    }

    protected function field(): string
    {
        return 'entities';
    }
}