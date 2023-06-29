<?php
namespace App\Models;

use CodeIgniter\Model;

class FeaturesModel extends Model
{
    protected $table = 'features';
    protected $primaryKey = 'id';
    protected $allowedFields = ['feature_name'];

    public function getFeatureNamesBySubId($subId)
    {
        return $this->select('feature_name')->where('sub_id', $subId)->findAll();
    }
}
