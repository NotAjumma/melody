<?php 
namespace App\Models;
use CodeIgniter\Model;
class SubscriptionModel extends Model
{
    protected $table = 'subscriptions';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['sub_name', 'feature_id'];
}