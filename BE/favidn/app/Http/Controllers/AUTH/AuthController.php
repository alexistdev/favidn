<?php
/*
 * Copyright (c) 2025.
 * Author : AlexistDev
 * Email : alexistdev@gmail.com
 * Github: https://github.com/alexistdev
 */

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use App\Http\Requests\AUTH\RegisterRequest;
use App\Http\Services\AUTH\RegisterService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    protected $registerService;

    /**
     * @param RegisterService $registerService
     */
    public function __construct(RegisterService $registerService)
    {
        $this->registerService = $registerService;
    }


    /**
     * @throws \Throwable
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        DB::beginTransaction();
        try{
            $token = $this->registerService->save($request);

            DB::commit();
            return response()->json([
                'success' => true,
                'message' => 'Data Successfully saved',
                'payload' => [
                    'token' => $token,
                    'data' => null,
                ]
            ], 200);
        } catch (Exception $e){
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
