<?php

namespace App\Enums;

enum UserType: string
{
    case ADMIN = 'admin';
    case MODERATOR = 'moderator';
    case CLIENT = 'client';
}
