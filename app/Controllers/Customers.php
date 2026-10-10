<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class Customers extends BaseController
{
    public function index(): string
    {
        $customerModel = new CustomerModel();

        return view('customers/index', [
            'title'     => 'Customer Accounts',
            'customers' => $customerModel->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('customers/new', [
            'title'  => 'New Customer',
            'errors' => [],
        ]);
    }

    public function create()
    {
        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/new', [
                'title'  => 'New Customer',
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $customerModel = new CustomerModel();
        $customerModel->insert([
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
            'created_at'=> date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('customers'));
    }

    public function edit($id): string
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('customers/edit', [
            'title'    => 'Edit Customer',
            'customer' => $customer,
            'errors'   => [],
        ]);
    }

    public function update($id)
    {
        $customerModel = new CustomerModel();
        $customer = $customerModel->find($id);

        if (! $customer) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'full_name' => 'required|max_length[100]',
            'email'     => 'required|valid_email|max_length[100]',
            'phone'     => 'permit_empty|max_length[20]',
        ];

        if (! $this->validate($rules)) {
            return view('customers/edit', [
                'title'    => 'Edit Customer',
                'customer' => $customer,
                'errors'   => $this->validator->getErrors(),
            ]);
        }

        $customerModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'email'     => $this->request->getPost('email'),
            'phone'     => $this->request->getPost('phone'),
        ]);

        return redirect()->to(site_url('customers'));
    }
}