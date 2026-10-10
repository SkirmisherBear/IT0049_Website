<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index(): string
    {
        $userModel = new UserModel();

        return view('users/index', [
            'title' => 'User Accounts',
            'users' => $userModel->findAll(),
        ]);
    }

    public function newForm(): string
    {
        return view('users/new', [
            'title'  => 'New User',
            'errors' => [],
        ]);
    }

    public function create()
    {
        $rules = [
            'username'  => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
        ];

        if (! $this->validate($rules)) {
            return view('users/new', [
                'title'  => 'New User',
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $userModel = new UserModel();

        $userModel->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to(site_url('users'));
    }

    public function edit($id): string
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('users/edit', [
            'title'  => 'Edit User',
            'user'   => $user,
            'errors' => [],
        ]);
    }

    public function update($id)
    {
        $userModel = new UserModel();
        $user = $userModel->find($id);

        if (! $user) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $file = $this->request->getFile('avatar');
        $hasAvatarUpload = $file && $file->getError() !== UPLOAD_ERR_NO_FILE;

        $rules = [
            'username'  => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
        ];

        if ($hasAvatarUpload) {
            $rules['avatar'] =
                'uploaded[avatar]|is_image[avatar]|'
                . 'mime_in[avatar,image/jpg,image/jpeg,image/png]|'
                . 'ext_in[avatar,jpg,jpeg,png]|max_size[avatar,2048]';
        }

        if (! $this->validate($rules)) {
            return view('users/edit', [
                'title'  => 'Edit User',
                'user'   => $user,
                'errors' => $this->validator->getErrors(),
            ]);
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
        ];

        if ($hasAvatarUpload) {
            $extension = $file->getMimeType() === 'image/png' ? 'png' : 'jpg';
            $avatarName = bin2hex(random_bytes(16)) . '.' . $extension;
            $uploadPath = FCPATH . 'uploads/avatars/';

            if (! is_dir($uploadPath)) {
                mkdir($uploadPath, 0775, true);
            }

            service('image')
                ->withFile($file->getTempName())
                ->fit(160, 160, 'center')
                ->save($uploadPath . $avatarName);

            $data['avatar'] = $avatarName;
        }

        $userModel->update($id, $data);

        return redirect()->to(site_url('users'));
    }
}