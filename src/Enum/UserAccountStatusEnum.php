<?php

declare(strict_types=1);

namespace App\Enum;

enum UserAccountStatusEnum: String
{
    case ACTIVE = 'active';
    case INACTIVE = 'inactive';
    case BLOCKED = 'blocked';
    CASE BANNED = 'banned';
}
