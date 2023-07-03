<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $usersModel;
    protected $userSubscriptionModel;
    protected $albumsListModel;

    public function __construct()
    {
        parent::__construct();
        $this->usersModel = new UsersModel();
        $this->albumsListModel = new AlbumsListModel();
        $this->userSubscriptionModel = new UserSubscriptionModel();
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
}
