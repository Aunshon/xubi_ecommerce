<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SecurityPinController extends Controller
{
    function createSecurityPin()
    {
        return view('Secutiry.createSecurityPin');
    }
    function saveNewSecurityPin($digit,$generate)
    {
        if ($digit == null || $digit == 0) {
            $digit=12;
        }
        if ($generate == null || $generate == 0) {
            $generate=20;
        }

        function getName($digit) {
            // $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTU,VWXYZ/\!@#$%&*()_-=`~.?|';
            $characters = '0123456789';
            $randomString = '';

            for ($i = 0; $i < $digit; $i++) {
                $index = rand(0, strlen($characters) - 1);
                $randomString .= $characters[$index];
            }

            return $randomString;
        }

        for ($i=0; $i < $generate; $i++) {
            echo "<b>".getName($digit)."</b>"."<br><br>";
        }
    }
}
