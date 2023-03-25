<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{

    //===================================================
    public function changeLanguage($id)
    {
        if (isset($_SERVER['HTTP_COOKIE'])) {
            $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
            foreach ($cookies as $cookie) {
                $parts = explode('=', $cookie);
                $name  = trim($parts[0]);
                if ($name == 'googtrans') {
                    setcookie($name, '', time() - 1000);
                    setcookie($name, '', time() - 1000, '/');
                }
            }
        }

        if ($id == 1) {
            Session::put('googtrans', 1);
            setrawcookie('googtrans', "/en", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } elseif ($id == 2) {
            Session::put('googtrans', 2);
            setrawcookie('googtrans', "/es", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } elseif ($id == 3) {
            Session::put('googtrans', 3);
            setrawcookie('googtrans', "/pt", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } elseif ($id == 4) {
            Session::put('googtrans', 4);
            setrawcookie('googtrans', "/de", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } elseif ($id == 5) {
            Session::put('googtrans', 5);
            setrawcookie('googtrans', "/fr", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } elseif ($id == 6) {
            Session::put('googtrans', 6);
            setrawcookie('googtrans', "/it", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        } else {
            Session::put('googtrans', 1);
            setrawcookie('googtrans', "/en", strtotime('+30 days'), "/", $_SERVER['SERVER_NAME']);
        }

        return back();
    }
}
