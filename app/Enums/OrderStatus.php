<?php
namespace App\Enums;

enum OrderStatus:string
{
    case WAITING = 'waiting';
    case APPROVED = 'approved';
    case REJECTED = 'rejected';
    case CANCELED = 'canceled';
}
