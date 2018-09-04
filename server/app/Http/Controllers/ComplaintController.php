<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Complaint;
use Illuminate\Support\Facades\Validator;

class ComplaintController extends Controller
{
    public function store(Request $r){
    	$this->validate($r, [
    		'ip' => 'unique:complaints'
    	]);

    	$action = Complaint::create([
    		'way' => $r->way,
    		'about' => $r->about,
    		'target' => $r->target,
            'message' => $r->message,
    		'ip' => $r->ip,
    	]);
    	return $action;
    }
}
