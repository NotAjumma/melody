<?php 
namespace App\Models;
use CodeIgniter\Model;
class SubscriptionModel extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['sub_name'];

    public function getSubUsingSubId($sub_id)
    {
        return $this->where('id', $sub_id)
                    ->findAll();
    }

    public function getAllSub()
    {
        return $this->findAll();
    }

}