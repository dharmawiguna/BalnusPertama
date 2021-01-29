<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $response = Http::get('https://reqres.in/api/users?page=2');
        $users = collect($response->json()['data'])->count($response);
    	return view('index', compact(['users']));
    }

    public function getUser()
    {
    	$response = Http::get('https://reqres.in/api/users?page=2');
    	$users = $response->json()['data'];

        // $total_order= collect($order->json()['data'])->count($order);

    	// dd($users);
    	return view('users.user', compact(['users']));
    }
}
