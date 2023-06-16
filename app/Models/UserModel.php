<?php 
namespace App\Models;
use CodeIgniter\Model;
class UserModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['product_name', 'product_price'];
}