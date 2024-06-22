<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ProfileController extends Controller
{
    public function index($id){
        // Declare variables
        $name = "Donal Trump";
        $age = "75";

        // Create the data array
        $data = [
            'id' => $id,
            'name' => $name,
            'age' => $age,
        ];

        // Set the cookie properties
        $cookieName = 'access_token';
        $cookieValue = '123-XYZ';
        $minutes = 1;
        $path = '/';
        $domain = request()->getHost(); // This gets the current host name
        $secure = false; // For HTTP, not HTTPS
        $httpOnly = true; // The cookie is accessible only through the HTTP protocol

        // Create the cookie
        $cookie = Cookie::make($cookieName, $cookieValue, $minutes, $path, $domain, $secure, $httpOnly);

        // Return the response with the cookie
        return response()->json($data, 200)->withCookie($cookie);
    }
}
