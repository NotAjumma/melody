<?php

namespace App\Models;

use CodeIgniter\Model;

class AlbumsListModel extends Model
{
    protected $table = 'albums';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        
        'album_title',
        'artist',
        'genre',
        'release_date',
        'average_rating',
        'descriptions',
        'ranking',
        'number_ratings',
        'number_reviews',
        'price'
    ];

  public function getAlbumsSortedByGenre()
{
    $builder = $this->db->table('albums');
    $builder->orderBy("CASE
        WHEN genre LIKE '%Rock%' THEN 1
        WHEN genre LIKE '%Pop%' THEN 2
        WHEN genre LIKE '%Hip%' THEN 3
        ELSE 4
    END, genre", 'ASC');
    $query = $builder->get();

    if ($query->getResult()) {
        return $query->getResultArray();
    } else {
        return [];
    }
}

public function getAlbumsByIDs(array $albumIDs)
    {
        $this->whereIn('id', $albumIDs);
        $query = $this->findAll();
        // print_r($query);
        return $query;
    }

    public function getSingleAlbumsByIDs($albumIDs)
    {
         return $this->where('id', $albumIDs)->findAll();
    }

public function updateAlbum($id, $updatedAlbumData)
    {
        echo $id;
        print_r($updatedAlbumData);
        $this->update($id, $updatedAlbumData);
        return true;
    }

    public function deleteAlbumById($id)
    {
        return $this->where('id', $id)
                    ->delete();
    }


    
}
