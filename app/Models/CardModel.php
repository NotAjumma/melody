<?php 
namespace App\Models;
use CodeIgniter\Model;
class CardModel extends Model
{
    protected $table = 'card';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['username', 'name', 'card_number', 'expiration', 'security_code', 'card_type'];
}