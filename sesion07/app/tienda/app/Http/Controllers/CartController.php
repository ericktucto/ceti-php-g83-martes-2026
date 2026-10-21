<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddItemRequest;
use App\Http\Requests\RemoveItemRequest;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\User;
use Illuminate\Routing\Attributes\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = request()->user();
        $cart = request()->user()->cart()->with('cart_items.producto')->firstOrCreate();
        
        if (!Gate::forUser($user)->allows('view', $cart)) {
            return response()->json([
                'errors' => ['No estas autorizado'],
            ], 403);
        }

        return $cart;
    }

    public function add(AddItemRequest $request)
    {
        $items = $request->input('items');

        /** @var Cart $cart */
        $cart = request()->user()->cart()->firstOrCreate();

        $cart->cart_items()->createMany($items);

        return $cart->load('cart_items');
    }

    #[Middleware('auth:sanctum')]
    public function remove(RemoveItemRequest $request)
    {
        return 'Hola';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCartRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cart $cart)
    {
        //
    }
}
