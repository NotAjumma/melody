<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $usersModel;
    protected $userSubscriptionModel;
    protected $albumsListModel;
    protected $userAlbumsDetailsListModel;
    protected $userAlbumsListModel;

    public function __construct()
    {
        parent::__construct();
        $this->usersModel = new UsersModel();
        $this->albumsListModel = new AlbumsListModel();
        $this->userSubscriptionModel = new UserSubscriptionModel();
        $this->userAlbumsDetailsListModel = new UserAlbumsDetailsListModel();
        $this->userAlbumsListModel = new UserAlbumsListModel();

    }

    public function getTotalUsers()
    {
        return $this->usersModel->where('role_id !=', 1)->countAllResults();
    }

    public function getTotalSubscriptions()
    {
        return $this->userSubscriptionModel->countAll();
    }

    public function getTotalAmount()
    {
        $result1 = $this->userSubscriptionModel->selectSum('total_amount')->get()->getRow();
        $result2 = $this->userAlbumsListModel->selectSum('total_amount')->get()->getRow();
        $totalAmount1 = $result1 ? $result1->total_amount : 0;
        $totalAmount2 = $result2 ? $result2->total_amount : 0;
        return $totalAmount1 + $totalAmount2;
    }


    public function getTotalAlbums()
    {
        return $this->albumsListModel->countAll();
    }

    // public function getTotalAlbumsBuy()
    // {
    //     $result = $this->userAlbumsModel->countAllResults();
    //     return $result;
    // }


    public function findTopAlbums()
    {
        $query = $this->db->table('user_albums_details')
            ->select('album_id, COUNT(album_id) AS occurrence')
            ->groupBy('album_id')
            ->orderBy('occurrence', 'DESC')
            ->limit(5) // Change the limit according to your requirement
            ->get();

        return $query->getResultArray();
    }

    public function findAllTopAlbums()
    {
        $query = $this->db->table('user_albums_details')
            ->select('album_id, COUNT(album_id) AS occurrence')
            ->groupBy('album_id')
            ->orderBy('occurrence', 'DESC')
            // ->limit() // Change the limit according to your requirement
            ->get();

        return $query->getResultArray();
    }

    public function countTotalAlbumOccurrences()
    {
        return $this->db->table('user_albums_details')
            ->countAllResults('album_id');
    }

    public function sumTotalAlbumOccurrences()
    {
        return $this->db->table('user_albums_details')
            ->selectSum('album_id')
            ->get()
            ->getRow()
            ->album_id;
    }


}
