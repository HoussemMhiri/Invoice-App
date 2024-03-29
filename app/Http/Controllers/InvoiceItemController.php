<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;

class InvoiceItemController extends Controller
{
    public function delete_invoice_items(InvoiceItem $invoiceItem)
    {
        $invoiceItem->delete();
        return response('', 204);
    }
}
