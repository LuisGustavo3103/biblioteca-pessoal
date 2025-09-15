<?php

namespace App\Enums;

enum LendStatusEnum: string
{
    case IN_PROGRESS = 'in_progress';
    case EXPIRED = 'expired';
    case FINISHED = 'finished';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public static function getLabels(): array
    {
        return [
            self::IN_PROGRESS->value => 'Em Andamento',
            self::EXPIRED->value => 'Expirado',
            self::FINISHED->value => 'Finalizado',
        ];
    }

    public function label(): string
    {
        return match ($this) {
            self::IN_PROGRESS => 'Em Andamento',
            self::EXPIRED => 'Em Atraso',
            self::FINISHED => 'Entregue',
        };
    }
}
