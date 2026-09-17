<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index(): string
    {
        $users = [
            [
                'username'  => 'admin01',
                'full_name' => 'Arnaldo Baldonado',
                'role'      => 'Administrator'
            ],
            [
                'username'  => 'cashier01',
                'full_name' => 'Paulo Delas Armas',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'cashier02',
                'full_name' => 'Michael B. Jordan',
                'role'      => 'Cashier'
            ],
            [
                'username'  => 'manager01',
                'full_name' => 'Michael Jordan',
                'role'      => 'Manager'
            ],
            [
                'username'  => 'staff01',
                'full_name' => 'Ella Navarro',
                'role'      => 'Staff'
            ]
        ];

        $data = [
            'title' => 'User Accounts',
            'users' => $users
        ];

        return view('users/index', $data);
    }
}