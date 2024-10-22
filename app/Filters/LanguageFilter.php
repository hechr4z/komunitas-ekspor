<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class LanguageFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Cek jika session bahasa sudah diset
        $session = session();
        $uri = service('uri');

        // Ambil segmen pertama dari URL (misalnya 'id' atau 'en')
        $lang = $uri->getSegment(1);

        // Jika tidak ada segment bahasa di URL, arahkan ke session bahasa yang sudah ada
        if (!$lang) {
            if ($session->has('lang')) {
                $lang = $session->get('lang');
            } else {
                // Jika session bahasa tidak ada, set default ke 'id'
                $session->set('lang', 'id');
                $lang = 'id';
            }

            // Redirect ke URL dengan bahasa yang diset
            $currentPath = uri_string(); // Mendapatkan path saat ini
            return redirect()->to(base_url($lang . '/' . $currentPath));
        }

        // Jika segmen bahasa berbeda dari session, set session sesuai URL
        if ($lang === 'id' || $lang === 'en') {
            $session->set('lang', $lang);

            // Set locale sesuai dengan bahasa dari URL
            service('request')->setLocale($lang);
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada yang perlu dilakukan setelah request
    }
}
