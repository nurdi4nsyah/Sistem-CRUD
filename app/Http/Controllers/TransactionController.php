<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;


class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaction = Transaction::orderBy('time', 'DESC')->get();
        $respons = [
            'message' => 'List transaction order by time',
            'data' => $transaction
        ];   
        return response()->json($respons, Response::HTTP_OK);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>'required',
            'amount'=>'required|numeric',
            'type'=>'required|in:expends,revenue',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try{
            $transaction = Transaction::create($request->all());
            $respons = [
                'message' => 'Create Transaction',
                'data' => $transaction
            ];
            return response()->json ($respons, Response::HTTP_CREATED);

        } catch (QueryException $e){
            return response()->json([
                'message' => "failed " . $e->errorInfo
            ]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaction = Transaction::findOrFail($id);

        $respons = [
            'message' => 'Show Transaction',
            'data' => $transaction
        ];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       $transaction = Transaction::findOrFail($id);

       $validator = Validator::make($request->all(),[
           'title'=>'required',
           'amount'=>'required|numeric',
           'type'=>'required|in:expends,revenue',

       ]);
       if ($validator->fails()){
           return response()->json($validator->errors(),
           Response::HTTP_OK);
       }

       try{
           $transaction->update($request->all());
           $respons = [
               'message' => 'Transaction update',
               'data' => $transaction
            ];
           return response()->json($respons, Response::HTTP_OK);
       
        }catch (QueryException $e){
           return response()->json([
               'message'=>'failed ' . $e->errorInfo
           ]);
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
