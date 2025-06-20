<?php
namespace App\Factories;

use App\Models\Ruangan;
use InvalidArgumentException;

class RuanganFactory
{
    public static function create(string $type, array $attributes): Ruangan
    {
        return match ($type) {
            'kelas' => self::createRuangKelas($attributes),
            'lab' => self::createLaboratorium($attributes),
            'auditorium' => self::createAuditorium($attributes),
            default => throw new InvalidArgumentException("Tipe ruangan [{$type}] tidak valid."),
        };
    }

    private static function createRuangKelas(array $attributes): Ruangan
    {
        $defaults = ['capacity' => 40];
        $data = array_merge($defaults, $attributes);
        return Ruangan::create($data);
    }

    private static function createLaboratorium(array $attributes): Ruangan
    {
        $defaults = ['capacity' => 25, 'is_available' => false]; 
        $data = array_merge($defaults, $attributes);
        return Ruangan::create($data);
    }

    private static function createAuditorium(array $attributes): Ruangan
    {
        $defaults = ['capacity' => 200];
        $data = array_merge($defaults, $attributes);
        return Ruangan::create($data);
    }
}