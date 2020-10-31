<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Demo\Usersmanagement\UserMng;

class UsersControllers extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // parent::__construct($request);
        $this->userMng = new UserMng();
    }

    //
    public function list()
    {
    	$respApiCall = $this->userMng->GetAllUsers();
        return view('users.lists');
    }

    //
    public function listData()
    {
    	$respApiCall = $this->userMng->GetAllUsers();
    	if ($respApiCall['status'] == 200) {
    		return response()->json($respApiCall);
    	} else {
    		return response()->json([]);	
    	}
    }

    public function details($id)
    {
        $respApiCall = $this->userMng->GetDetailUser($id);
        if ($respApiCall['status'] == 200) {
            $data = $respApiCall['data'];
        } else {
            $data = [];    
        }
        // print_r($respApiCall);die;
        return view('users.details', ['data' => $data, 'message' => $respApiCall['messages']]);
    }
}
