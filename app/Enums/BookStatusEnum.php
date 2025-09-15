<?php

namespace App\Enums;

enum BookStatusEnum: string
{
    case AVAILABLE = 'available';
    case BORROWED = 'borrowed';
    case NOT_AVAILABLE = 'not_available';


    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public function label(): string
    {
        return match ($this) {
            self::AVAILABLE => 'Diponível',
            self::BORROWED => 'Emprestado',
            self::NOT_AVAILABLE => 'Não Disponível',
        };
    }
}
