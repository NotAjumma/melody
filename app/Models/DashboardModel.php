<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $usersModel;
    protected $userSubscriptionModel;
    protected $albumsListModel;
    protected $userAlbumsDetailsListModel;

    public function __construct()
    {
        parent::__construct();
        $this->usersModel = new UsersModel();
        $this->albumsListModel = new AlbumsListModel();
        $this->userSubscriptionModel = new UserSubscriptionModel();
        $this->userAlbumsDetailsListModel = new UserAlbumsDetailsListModel();

    }

    public function getTotalUsers()
    {
        return $this->usersModel->countAll();
    }

    public function getTotalSubscriptions()
    {
        return $this->userSubscriptionModel->countAll();
    }

    public function getTotalAmount()
    {
        $result = $this->userSubscriptionModel->selectSum('total_amount')->get()->getRow();
        return $result ? $result->total_amount : 0;
    }

    public function getTotalAlbums()
    {
        return $this->albumsListModel->countAll();
    }

     public function getTopPurchasedAlbums($limit = 5)
    {
        echo "inside";
        $userAlbumsDetailsListModel = new UserAlbumsDetailsListModel();
        $userAlbumsDetailsListModel->table = 'user_albums_details';

        // echo $userAlbumsDetailsListModel;

        $builder = $userAlbumsDetailsListModel->db->table($userAlbumsDetailsListModel->table);
        $builder->select('album_id, COUNT(album_id) as purchase_count');
        $builder->groupBy('album_id');
        $builder->orderBy('purchase_count', 'DESC');
        $builder->limit($limit);

        $query = $builder->get();
        return $query->getResult();
    }
}
