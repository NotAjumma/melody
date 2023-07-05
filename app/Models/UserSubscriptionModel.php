<?php 
namespace App\Models;
use App\Models\UsersModel;
use CodeIgniter\Model;
class UserSubscriptionModel extends Model
{
    protected $table = 'usersubscription';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['sub_id', 'username', 'started_date', 'ended_date', 'durationMonth', 'total_amount', 'status', 'card_id'];

    public function getUserSubUsingUsername($username)
    {
        return $this->where('username', $username)
                    ->findAll();
    }

public function getSubscriptions()
{
    $usersWithSubscription = $this->select('usersubscription.*, users.*, subscriptions.sub_name')
        ->join('subscriptions', 'subscriptions.id = usersubscription.sub_id', 'left')
        ->join('users', 'users.username = usersubscription.username', 'left')
        ->where('users.role_id !=', 1)
        ->findAll();

    $usersModel = new UsersModel();

    $usersWithoutSubscription = $usersModel->where('role_id !=', 1)
                  ->findAll();

    $users = array_merge($usersWithSubscription, $usersWithoutSubscription);
    

        // print_r($usersWithoutSubscription);
    // $users = array_merge($usersWithSubscription, $usersWithoutSubscription);

    return $users;
}

public function getUsersWithoutSubscription()
{
    
    

    return $users;
}





}