<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTransactionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $user = auth()->user();

        if ($user != null) {
            $user = DB::table('data_users')->where('user_id', $user->id)->first();
        }
        if ($user->key == $request->from && $user != null) {
            $from = DB::table('data_users')->where('key', $request->from)->first();
            $to = DB::table('data_users')->where('key', $request->to)->first();


            if ($from == null || $to == null) {
                return response()->json([
                    'message' => 'From or To user not found'
                ]);
            }
            if ($from->balance < $request->amount) {
                return response()->json([
                    'message' => 'Insufficient balance'
                ]);
            }
            if ($from->key == $to->key) {
                return response()->json([
                    'message' => 'Cannot transfer to yourself'
                ]);
            }
            if ($request->amount <= 0) {
                return response()->json([
                    'message' => 'Amount must be greater than 0'
                ]);
            }

            $from_balance = $from->balance;
            $from_balance = $from_balance - $request->amount;

            $to_balance = $to->balance;
            $to_balance = $to_balance + $request->amount;

            DB::table('data_users')->where('key', $request->from)->update(['balance' => $from_balance]);
            DB::table('data_users')->where('key', $request->to)->update(['balance' => $to_balance]);

            Transaction::create([
                'from' => $request->from,
                'to' => $request->to,
                'amount' => $request->amount,
                'toNewBalance' => $to_balance,
                'fromNewBalance' => $from_balance,
            ]);

            return response()->json([
                'message' => 'Transaction success'
            ]);
        }
        return response()->json([
            'message' => 'Unauthorized'
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
