<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index(): string
    {
        $customers = [
            [
                'full_name' => 'Juan Dela Cruz',
                'email'     => 'juan@example.com',
                'phone'     => '09171234567'
            ],
            [
                'full_name' => 'Maria Santos',
                'email'     => 'maria@example.com',
                'phone'     => '09181234567'
            ],
            [
                'full_name' => 'Carlo Reyes',
                'email'     => 'carlo@example.com',
                'phone'     => '09191234567'
            ],
            [
                'full_name' => 'Angela Garcia',
                'email'     => 'angela@example.com',
                'phone'     => '09201234567'
            ],
            [
                'full_name' => 'Paolo Mendoza',
                'email'     => 'paolo@example.com',
                'phone'     => '09211234567'
            ]
        ];

        $data = [
            'title'     => 'Customer Accounts',
            'customers' => $customers
        ];

        return view('customers/index', $data);
    }
}