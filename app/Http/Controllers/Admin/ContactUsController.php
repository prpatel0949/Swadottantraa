<?php

namespace App\Http\Controllers\Admin;

use App\ContactUs;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('admin.contact-us');
    }

    public function list()
    {
        return response()->json([ 'data' => ContactUs::orderBy('id', 'DESC')->get() ], 200);
    }

    public function changeStatus(Request $request, $id)
    {
        $lead = ContactUs::find($id);
        $lead->status = $request->status;
        $lead->save();

        return true;
    }
}
