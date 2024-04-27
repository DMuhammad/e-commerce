<?php namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class IsAdmin implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // If user is already logged in and has a role Admin
        if (session()->get('id') && session()->get('role') == 'Admin') {
            // then continue to the next request
            return;
        }

        // If user is already logged in but has no role Admin
        if (session()->get('id') && session()->get('role') != 'Admin') {
            // then redirect him to the dashboard page
            return redirect()->to('/dashboard');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}