<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function get_all_invoice()
    {
        $invoices = Invoice::with('customer')->orderBy('id', 'DESC')->get();

        return response()->json([
            'invoices' => $invoices
        ], 200);
    }

    public function search_invoices(Request $request)
    {
        $search = $request->get('s');
        if ($search) {
            $invoices = Invoice::with('customer')
                ->where('id', 'LIKE', "%$search%")
                ->get();
            return response()->json([
                'invoices' => $invoices
            ], 200);
        } else {
            return $this->get_all_invoice();
        }
    }


    public function create_invoice(Request $request)
    {
        $counter = Counter::where("key", 'invoice')->first();
        $random = Counter::where("key", 'invoice')->first();
        $invoice = Invoice::orderBy('id', 'DESC')->first();
        if ($invoice) {
            $invoice = $invoice->id + 1;
            $counters = $counter->value + $invoice;
        } else {
            $counters = $counter->value;
        }

        $formData = [
            'number' => $counter->prefix . $counters,
            'customer_id' => null,
            'customer' => null,
            'date' => date('Y-m-d'),
            'due_date' => null,
            'reference' => null,
            'terms_and_conditions' => 'Default Terms and Conditions',
            'discount' => 0,
            'items' => [
                'product_id' => null,
                'product' => null,
                'unit_price' => 0,
                'quantity' => 1
            ]

        ];
        return response()->json($formData);
    }

    public function add_invoice(Request $request)
    {
        $invoiceItem = $request->input('invoice_item');

        $invoiceData = [
            'sub_total' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'customer_id' => $request->input('customer_id'),
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'due_date' => $request->input('due_date'),
            'discount' => $request->input('discount'),
            'reference' => $request->input('reference'),
            'terms_and_conditions' => $request->input('terms_and_conditions')
        ];

        $invoice = Invoice::create($invoiceData);

        foreach (json_decode($invoiceItem) as $item) {
            $itemData = [
                'product_id' => $item->id,
                'invoice_id' => $invoice->id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price
            ];

            InvoiceItem::create($itemData);
        }
    }

    public function show_invoice(Invoice $invoice)
    {
        $TheInvoice = $invoice->load(['customer', 'invoice_items.product']);
        return response()->json([
            'invoice' => $TheInvoice
        ], 200);
    }


    public function edit_invoice(Invoice $invoice)
    {
        $TheInvoice = $invoice->load(['customer', 'invoice_items.product']);
        return response()->json([
            'invoice' => $TheInvoice
        ], 200);
    }

    public function update_invoice(Request $request, Invoice $invoice)
    {

        $invoiceData = [
            'sub_total' => $request->input('subtotal'),
            'total' => $request->input('total'),
            'customer_id' => $request->input('customer_id'),
            'number' => $request->input('number'),
            'date' => $request->input('date'),
            'due_date' => $request->input('due_date'),
            'discount' => $request->input('discount'),
            'reference' => $request->input('reference'),
            'terms_and_conditions' => $request->input('terms_and_conditions')
        ];


        $invoice->update($invoiceData);

        $invoice->invoice_items()->delete();

        $invoiceItem = $request->input('invoice_item');
        foreach (json_decode($invoiceItem) as $item) {
            $itemData = [
                'product_id' => $item->product_id,
                'invoice_id' => $invoice->id,
                'quantity' => $item->quantity,
                'unit_price' => $item->unit_price
            ];

            InvoiceItem::create($itemData);
        }
    }

    public function delete_invoice(Invoice $invoice)
    {
        $invoice->delete();

        return response('DELETED SUCCESSFULLY', 204);
    }
}
