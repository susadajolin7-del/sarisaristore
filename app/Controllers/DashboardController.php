<?php namespace App\Controllers;

class DashboardController extends BaseController
{
    public function index()
    {
        // This 'dashboard/index' matches the folder/file you created in Step 1
        return view('dashboard/index');
    }
}