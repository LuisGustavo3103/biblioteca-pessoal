<?php

namespace App\Enums;

enum BookGenderEnum: string
{
    case ROMANCE = 'romance';
    case FANTASY = 'fantasy';
    case SCIENCE_FICTION = 'science_fiction';
    case SUSPENSE = 'suspense';
    case ADVENTURE = 'adventure';
    case TERROR = 'terror';
    case BIOGRAPHY = 'biography';
    case DIDACTIC = 'didactic';

    public static function getValues(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    public function label(): string
    {
        return match ($this) {
            self::ROMANCE => 'Romance',
            self::FANTASY => 'Fantasia',
            self::SCIENCE_FICTION => 'Ficção Científica',
            self::SUSPENSE => 'Suspense',
            self::ADVENTURE => 'Aventura',
            self::TERROR => 'Terror',
            self::BIOGRAPHY => 'Biografia',
            self::DIDACTIC => 'Didático',
        };
    }
}
