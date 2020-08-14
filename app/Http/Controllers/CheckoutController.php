<?php

namespace App\Http\Controllers;

use App\RestaurantPackage;
use App\Transaction;
use App\TransactionDetail;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index(Request $request, $id) {
        $item = Transaction::with(['transaction_detail', 'restaurant_package', 'user'])->findOrFail($id);

        return view('pages.checkout',[
            'item' => $item
        ]);
    }

    public function process(Request $request, $id) {
        $restaurant_package = RestaurantPackage::findOrFail($id);

        $transaction = Transaction::create([
            'restaurant_packages_id' => $id,
            'users_id' => Auth::user()->id,
            'additional_price' => 0,
            'transaction_total' => $restaurant_package->price,
            'transaction_status' => 'IN_CART'
        ]);

        TransactionDetail::create([
            'transactions_id' => $transaction->id,
            'username' => Auth::user()->username,
            'date_reservation' => Carbon::now()->addYears(5)
        ]);

        return redirect()->route('checkout', $transaction->id);
    }

    public function remove(Request $request, $detail_id) {
        $item = TransactionDetail::findOrFail($detail_id);

        $transaction = Transaction::with([
            'transaction_detail', 'restaurant_package'
        ])->findOrFail($item->transactions_id);

        $transaction->transaction_total -= $transaction->restaurant_package->price;

        $transaction->save();

        $item->delete();

        return redirect()->route('checkout', $item->transactions_id);
    }

    public function create(Request $request, $id) {
        $request->validate([
            'username' => 'required|string|exists:users,username',
            'date_reservation' => 'required'
        ]);

        $data = $request->all();

        $data['transactions_id'] = $id;

        TransactionDetail::create($data);

        $transaction = Transaction::with([
            'restaurant_package'
        ])->find($id);

        $transaction->transaction_total += $transaction->restaurant_package->price;

        $transaction->save();

        return redirect()->route('checkout', $id);
    }

    public function success(Request $request, $id) {
        $transaction = Transaction::findOrFail($id);

        $transaction->transaction_status = 'PENDING';

        $transaction->save();

        return view('pages.success');
    }
}
