<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyContactUsRequest;
use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactUs;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('frontend.contactuses.create');
    }

    public function store(StoreContactUsRequest $request)
    {
        $contactUs = ContactUs::create($request->all());
        $done = true;
        return redirect()->route('frontend.contact-us.create')->with('done',$done);
    }
}
