<?php 
namespace App\Models;
use CodeIgniter\Model;
class UserSubscriptionModel extends Model
{
    protected $table = 'usersubscription';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['sub_id', 'username', 'started_date', 'ended_date', 'durationMonth', 'total_amount', 'status', 'card_id'];
}