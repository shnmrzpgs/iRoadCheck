<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

//    protected $fillable = ['name'];
//
//    // Define constants for user types
//    public const ADMIN = 1;
//    public const MANAGER = 2;
//    public const STAFF = 3;
//
//    /**
//     * Retrieve the ID for a given user type name.
//     *
//     * @param string $name
//     * @return int|null
//     */
//    public static function getIdByName(string $name): ?int
//    {
//        return self::where('name', $name)->value('id');
//    }
}
