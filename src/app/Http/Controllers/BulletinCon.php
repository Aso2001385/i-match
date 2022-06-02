<?php
// 使わないかも
namespace App\Http\Controllers;
use Request;

class BulletinCon extends Controller
{
    // 掲示板の詳細表示
	public function read(Request $request)
	{
	    $data = $request::all();
	    return view('BulletinDetailYour',compact('data'));
	}

	// public function userSave(Request $request)
	// {
	// 	$data1 = $request::all();
	// 	return view('signupComp',compact('data1'));
	// }
}