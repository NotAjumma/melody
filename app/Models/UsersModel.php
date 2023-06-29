<?php 
namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'username';

    protected $allowedFields = ['password', 'email', 'nickname', 'date_of_birth', 'gender'];

    protected $beforeInsert = ['assignDefaultRole'];

    protected function assignDefaultRole(array $data)
    {
        $data['data']['role_id'] = 2; // Set default role_id to 2
        return $data;
    }

    public function updatePassword($username, $currentPassword, $newPassword)
    {
        // Retrieve the user record by username
        $user = $this->find($username);

        // if (!$user) {
        //     return false; // User not found
        // }

        // Verify if the current password matches the stored password
        if (password_verify($currentPassword, $user['password'])) {
            return false; // Current password is incorrect
        }

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the user's password
        $data = [
            'password' => $hashedPassword,
        ];
        $this->update($username, $data);

        return true; // Password updated successfully
    }
    
    public function updateProfile($username, $userData)
    {
        $this->update($username, $userData);
        return true;
    }
}
