<?php


namespace App\Enums;

enum AdvertStatus: string
{
    case PENDENTE   = "Em processamento”";
    case PROCESSADO = "Processado";

    public static function fromValue(string $name): string
    {
        foreach (self::cases() as $status) {
            if($name === $status->name) {
                return $status->value;
            }
        }

        throw new \ValueError("$status is not a valid one");
    }
}
