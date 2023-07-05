<?php

namespace App\Models;
use App\Models\UserAlbumsDetailsListModel;


use CodeIgniter\Model;

class UserAlbumsListModel extends Model
{
    protected $table = 'user_albums';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'date_purchased',
        'username',
        'card_id',
        'total_amount'
    ];

    public function storeAlbums($username, $albums, $totalPay,$cardId)
    {
        // echo "inside fx";
        
        $data = [
            'username' => $username,
            'date_purchased' => date('Y-m-d H:i:s'),
            'card_id' => $cardId,
            'total_amount' => $totalPay,
        ];

        // print_r($data);

        $this->insert($data);

        $userAlbumId = $this->insertID();
        // echo $userAlbumId;

        if ($userAlbumId) {

            $userAlbumsDetailsListModel = new UserAlbumsDetailsListModel();
                // print_r($albums);

            foreach ($albums as $album) {
                // echo $username;

                $albumData = [
                    'user_album_id' => $userAlbumId,
                    'album_id' => $album['id'],
                ];
                // echo $album['id'];
                $userAlbumsDetailsListModel->addDetails($albumData);
            }
                // echo $album['id'];
        }

        return $userAlbumId;
    }
}
