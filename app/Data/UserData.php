<?php

namespace App\Data;

use Carbon\Carbon;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UserData extends Data
{
    public int|Optional $id;

    public string $name;

    public string $email;

    public string|Optional $password;

    public Carbon|Optional $created_at;

    public Carbon|Optional $updated_at;

    public Carbon|Optional $deleted_at;
}
