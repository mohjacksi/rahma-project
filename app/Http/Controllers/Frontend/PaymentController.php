<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyPaymentRequest;
use App\Http\Requests\StorePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Models\Bank;
use App\Models\DonationCategory;
use App\Models\Payment;
use App\Models\Project;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PaymentController extends Controller
{
    public function index()
    {

        $payments = Payment::with(['project'])->get();

        $banks = Bank::all();

        $project = Project::find(request()->project);

        $amount = request()->amount;

        $category = DonationCategory::find(request()->category);

        return view('frontend.payments.index', compact('payments','banks','project', 'amount','category'));
    }

    public function create()
    {
        abort_if(Gate::denies('payment_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.payments.create', compact('projects'));
    }

    public function store(StorePaymentRequest $request)
    {
        $payment = Payment::create($request->all());


        return redirect()->route('frontend.payments.index')->with( ['done' => true] );
    }

    public function edit(Payment $payment)
    {
        abort_if(Gate::denies('payment_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $projects = Project::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $payment->load('project');

        return view('frontend.payments.edit', compact('payment', 'projects'));
    }

    public function update(UpdatePaymentRequest $request, Payment $payment)
    {
        $payment->update($request->all());

        return redirect()->route('frontend.payments.index');
    }

    public function show(Payment $payment)
    {
        abort_if(Gate::denies('payment_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->load('project');

        return view('frontend.payments.show', compact('payment'));
    }

    public function destroy(Payment $payment)
    {
        abort_if(Gate::denies('payment_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $payment->delete();

        return back();
    }

    public function massDestroy(MassDestroyPaymentRequest $request)
    {
        Payment::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
