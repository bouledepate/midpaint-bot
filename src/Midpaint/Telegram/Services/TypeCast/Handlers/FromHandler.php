<?php

declare(strict_types=1);

namespace Midpaint\Telegram\Services\TypeCast\Handlers;

use Midpaint\Telegram\Types\User\FirstName;
use Midpaint\Telegram\Types\User\ID;
use Midpaint\Telegram\Types\User\LastName;
use Midpaint\Telegram\Types\User\User;
use Midpaint\Telegram\Services\TypeCast\AbstractTypeHandler;
use Midpaint\Telegram\Types\User\Username;

final class FromHandler extends AbstractTypeHandler
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

    protected function cast(array $data): User
    {
        return new User(
            new ID($data['id']),
            new FirstName($data['first_name'] ?? null),
            new LastName($data['last_name'] ?? null),
            new Username($data['username'] ?? null),
            $data['is_bot']
        );
    }

    protected function field(): string
    {
        return 'from';
    }
}