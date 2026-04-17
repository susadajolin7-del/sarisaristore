<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    /**
     * Read - List all users
     */
    public function index() {
        $data['users'] = $this->userModel->findAll();
        return view('dashboard/users_list', $data);
    }

    /**
     * Create - Store new user
     */
    public function store() {
        // 1. Validation Rules
        $rules = [
            'name'     => 'required|min_length[3]',
            'email'    => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role'     => 'required'
        ];

        if (!$this->validate($rules)) {
            // Returns to the list with specific validation errors
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Prepare Data
        // Note: Password hashing is handled automatically by the UserModel hashPassword callback
        $save = $this->userModel->save([
            'name'     => $this->request->getPost('name'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'role'     => $this->request->getPost('role'),
        ]);

        if ($save) {
            return redirect()->to('/users')->with('msg', 'New user has been registered successfully!');
        } else {
            return redirect()->back()->withInput()->with('err', 'Failed to create user. Please try again.');
        }
    }

    /**
     * Update - Edit user
     */
    public function update($id) {
        // 1. Validation Rules for Update
        // The email rule ignores the current user's ID so it doesn't trigger "is_unique" on itself
        $rules = [
            'name'  => 'required|min_length[3]',
            'email' => "required|valid_email|is_unique[users.email,id,{$id}]",
            'role'  => 'required'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // 2. Prepare Data
        $data = [
            'name'  => $this->request->getPost('name'),
            'email' => $this->request->getPost('email'),
            'role'  => $this->request->getPost('role'),
        ];
        
        // Only include password in the update if a new one was actually typed
        if ($this->request->getPost('password')) {
            $data['password'] = $this->request->getPost('password');
        }

        // 3. Execute Update
        if ($this->userModel->update($id, $data)) {
            return redirect()->to('/users')->with('msg', 'User profile has been updated!');
        } else {
            return redirect()->back()->with('err', 'No changes were made or update failed.');
        }
    }

    /**
     * Delete - Remove user
     */
    public function delete($id) {
        // Simple security check: Don't let the system delete the only remaining admin if necessary
        // (Optional logic can be added here)

        if ($this->userModel->delete($id)) {
            return redirect()->to('/users')->with('msg', 'User account has been removed.');
        } else {
            return redirect()->to('/users')->with('err', 'Unable to delete the user account.');
        }
    }
}