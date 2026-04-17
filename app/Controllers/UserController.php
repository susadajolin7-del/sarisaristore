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
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];
        
        // Only update password if a new one is provided
        if($this->request->getPost('password')) {
            $data['password'] = $this->request->getPost('password');
        }

        $this->userModel->update($id, $data);
        return redirect()->to('/users')->with('msg', 'User updated!');
    }

    // Delete
    public function delete($id) {
        $this->userModel->delete($id);
        return redirect()->to('/users')->with('msg', 'User deleted!');
    }
}