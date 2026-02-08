<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use Illuminate\Http\Request;

class LeaveRequestController extends Controller
{
    //
    public function index() {
        $leaverequests = LeaveRequest::all();

        return view('leave-requests.index', compact('leaverequests'));
    }
}