<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    // Read - List all users
    public function index() {
        $data['users'] = $this->userModel->findAll();
        return view('dashboard/users_list', $data);
    }

    // Create - Store new user
    public function store() {
        // 1. Validation
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Save Data (UserModel will handle hashing automatically)
        $this->userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => $this->request->getPost('role'),
        ]);

        return redirect()->to('/users')->with('msg', 'User added successfully!');
    }

    // Update - Edit user
    public function update($id) {
        $data =[
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];
        
        // Only update password if a new one is provided (Model will handle hashing)
        if ($this->request->getPost('password')) {
            $data['password'] = $this->request->getPost('password');
        }

        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/users')->with('msg', 'User updated successfully!');
        } else {
            return redirect()->back()->with('err', 'Failed to update user.');
        }
    }

    // Delete
    public function delete($id) {
        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('msg', 'User deleted!');
        }
        return redirect()->to('/users')->with('err', 'Could not delete user.');
    }
}