<?php

namespace App\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\CompanyImagesModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class CompanyImageController extends BaseController
{
    protected $companyimages;

    function __construct()
    {
        $this->companyimages = new CompanyImagesModel();
    }

    public function index()
    {
        $data = [
            'user' => session()->get('nama_lengkap'),
            'role' => session()->get('role'),
            'companyimages' => $this->companyimages->findAll(),
        ];
        return view('pages/dashboard/company-images', $data);
    }

    public function store()
    {
        $images = $this->request->getFileMultiple('images');

        // Check if the product folder exists, if not create it
        if (!is_dir(ROOTPATH . 'public/assets/uploads/img-company')) {
            mkdir(ROOTPATH . 'public/assets/uploads/img-company', 0777, TRUE);
        }

        foreach ($images as $image) {
            if ($image->isValid() && !$image->hasMoved()) {
                $imageName = $image->getRandomName();
                // Move the image to the 'writable/uploads/img-product' directory
                $image->move(ROOTPATH . 'public/assets/uploads/img-company', $imageName);

                $this->companyimages->insert([
                    'id' => Uuid::uuid4(),
                    'image' => $imageName
                ]);
            }
        }
        return redirect()->back();
    }

    public function update($id)
    {
        $oldImages = $this->companyimages->where('id', $id)->first();
        $image = $this->request->getFile('image');

        if ($image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();
            // Move the image to the 'writable/uploads/img-product' directory
            $image->move(ROOTPATH  . 'public/assets/uploads/img-company', $imageName);

            $this->companyimages->update($id, [
                'image' => $imageName
            ]);

            // Delete the old image
            unlink(ROOTPATH . 'public/assets/uploads/img-company/' . $oldImages->image);
        }
        return redirect()->back();
    }

    public function delete($id)
    {
        $image = $this->companyimages->where('id', $id)->first();
        $this->companyimages->delete($id);
        unlink(ROOTPATH . 'public/assets/uploads/img-company/' . $image->image);
        return redirect()->back();
    }
}
