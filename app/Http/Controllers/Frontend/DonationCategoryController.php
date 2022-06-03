<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDonationCategoryRequest;
use App\Http\Requests\StoreDonationCategoryRequest;
use App\Http\Requests\UpdateDonationCategoryRequest;
use App\Models\DonationCategory;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DonationCategoryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('donation_category_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donationCategories = DonationCategory::all();

        return view('frontend.donationCategories.index', compact('donationCategories'));
    }

    public function create()
    {
        abort_if(Gate::denies('donation_category_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.donationCategories.create');
    }

    public function store(StoreDonationCategoryRequest $request)
    {
        $donationCategory = DonationCategory::create($request->all());

        return redirect()->route('frontend.donation-categories.index');
    }

    public function edit(DonationCategory $donationCategory)
    {
        abort_if(Gate::denies('donation_category_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.donationCategories.edit', compact('donationCategory'));
    }

    public function update(UpdateDonationCategoryRequest $request, DonationCategory $donationCategory)
    {
        $donationCategory->update($request->all());

        return redirect()->route('frontend.donation-categories.index');
    }

    public function show(DonationCategory $donationCategory)
    {
        abort_if(Gate::denies('donation_category_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('frontend.donationCategories.show', compact('donationCategory'));
    }

    public function destroy(DonationCategory $donationCategory)
    {
        abort_if(Gate::denies('donation_category_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $donationCategory->delete();

        return back();
    }

    public function massDestroy(MassDestroyDonationCategoryRequest $request)
    {
        DonationCategory::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
