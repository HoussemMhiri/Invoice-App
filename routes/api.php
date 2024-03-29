<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\InvoiceItemController;
use App\Http\Controllers\ProductController;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('get_all_invoice', [InvoiceController::class, 'get_all_invoice']);

Route::get('search_invoices', [InvoiceController::class, 'search_invoices']);

Route::get('create_invoice', [InvoiceController::class, 'create_invoice']);

Route::get('customers', [CustomerController::class, 'all_customers']);

Route::get('products', [ProductController::class, 'all_products']);

Route::post('/add_invoice', [InvoiceController::class, 'add_invoice']);

Route::get('/show_invoice/{invoice}', [InvoiceController::class, 'show_invoice']);

Route::get('/edit_invoice/{invoice}', [InvoiceController::class, 'edit_invoice']);

Route::delete('/delete_invoice_items/{invoiceItem}', [InvoiceItemController::class, 'delete_invoice_items']);

Route::post('/update_invoice/{invoice}', [InvoiceController::class, 'update_invoice']);

Route::delete('/delete_invoice/{invoice}', [InvoiceController::class, 'delete_invoice']);
