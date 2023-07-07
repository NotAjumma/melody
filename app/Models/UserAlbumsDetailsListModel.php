<?php

namespace App\Models;

use CodeIgniter\Model;

class UserAlbumsDetailsListModel extends Model
{
    protected $table = 'user_albums_details';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'album_id',
        'user_album_id'
    ];

    public function addDetails($data)
    {
        $this->insert($data);

        $insertedId = $this->insertID(); // Get the inserted record's primary key value

        return $insertedId;
    }

     public function getAlbumsDetailsByUserAlbumId($user_album_id)
    {
        return $this->where('user_album_id', $user_album_id)->findAll();
    }
  
}
