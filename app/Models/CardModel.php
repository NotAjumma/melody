<?php 
namespace App\Models;
use CodeIgniter\Model;
class CardModel extends Model
{
    protected $table = 'card';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['username', 'name', 'card_number', 'expiration', 'security_code', 'card_type'];

     public function getCardByUsername($username)
    {
        return $this->where('username', $username)
                    ->findAll();
    }

     public function getCardById($card_id)
    {
        return $this->where('id', $card_id)
                    ->findAll();
    }
    
    public function addCard($data)
    {
        $this->insert($data);
        return $this->getInsertID();
    }

    public function deleteCardByUsernameAndId($username, $cardId)
    {
        return $this->where('username', $username)
                    ->where('id', $cardId)
                    ->delete();
    }
}