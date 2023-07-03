<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAlbumsDetailsModel extends Model
{
    protected $table = 'user_albums_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'username',
        'album_id',
        'user_album_id'
    ];
}
