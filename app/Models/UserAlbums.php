<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAlbumsModel extends Model
{
    protected $table = 'user_albums';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'date_purchased',
        'total_amount'
    ];
}
