<?php 
namespace App\Models;
use App\Models\UsersModel;
use CodeIgniter\Model;
class UserSubscriptionModel extends Model
{
    protected $table = 'usersubscription';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['sub_id', 'username', 'started_date', 'ended_date', 'durationMonth', 'total_amount', 'status', 'card_id'];

    public function insertUserSub($data){
        // echo "insdie";
        $this->insert($data);
        return $this->getInsertID();

    }
    public function getUserSubUsingUsername($username)
    {
        return $this->where('username', $username)
                    ->where('status', 'active')
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
    
    $data = $users;
    $uniqueData = [];
    $existingUsernames = [];

    foreach ($data as $item) {
        $username = $item['username'];
        if (!in_array($username, $existingUsernames)) {
            $uniqueData[] = $item;
            $existingUsernames[] = $username;
        }
    }

    // print_r($uniqueData);

        // print_r($usersWithoutSubscription);
    // $users = array_merge($usersWithSubscription, $usersWithoutSubscription);

    return $uniqueData;
}

public function getSubscriptionsByUsername($username)
{

    $usersWithSubscription = $this->select('usersubscription.*, users.*, subscriptions.sub_name')
    ->join('subscriptions', 'subscriptions.id = usersubscription.sub_id', 'left')
    ->join('users', 'users.username = usersubscription.username', 'left')
    ->where('users.username', $username)
    ->findAll();
    // print_r($usersWithSubscription);
    $usersModel = new UsersModel();
    $usersWithoutSubscription = $usersModel->where('username', $username)
        ->findAll();


    $users = array_merge($usersWithSubscription, $usersWithoutSubscription);
    
    $data = $users;
    $uniqueData = [];
    $existingUsernames = [];

    foreach ($data as $item) {
        $username = $item['username'];
        if (!in_array($username, $existingUsernames)) {
            $uniqueData[] = $item;
            $existingUsernames[] = $username;
        }
    }

    // print_r($uniqueData);

        // print_r($usersWithoutSubscription);
    // $users = array_merge($usersWithSubscription, $usersWithoutSubscription);

    return $uniqueData;
}

public function deleteSubscriptionByUsernameAndId($username, $usersubscriptionId)
{
    return $this->where('username', $username)
                ->where('id', $usersubscriptionId)
                ->delete();
}

public function updateUserSubByUsername($username, $updatedUserSubData){
    $this->where('username', $username)
    ->set($updatedUserSubData)
    ->update();

    
}




}