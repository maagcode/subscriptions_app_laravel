<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $invoices = $request->user()->invoices();

        return view('invoices.index')->withInvoices($invoices);
    }

    // Show function to request the user's invoice
    // No view is needed for this function
    public function show($invoiceId, Request $request)
    {
        return $request->user()->downloadInvoice($invoiceId, [
                'vendor' => 'MAAGCODE',
                'product' => 'Service subscription',
            ]);
    }
}
