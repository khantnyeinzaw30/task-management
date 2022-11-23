<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EmployeeAuthController extends Controller
{
    // authenticate employee
    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            if (!$user->is_project_manager) {
                return response()->json([
                    'token' => $user->createToken(time())->plainTextToken
                ], 200);
            } else {
                return response()->json([
                    'message' => "Can't access manager account!"
                ]);
            }
        } else {
            return response()->json(['token' => null]);
        }
    }

    // new employee user register
    public function register(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_project_manager' => 0,
        ];
        $user = User::create($data);
        Employee::create([
            'employee_code' => Str::random(10),
            'user_id' => $user->id
        ]);
        if ($user && Hash::check($request->password, $user->password && !$user->is_project_manager)) {
            return response()->json([
                'token' => $user->createToken(time())->plainTextToken
            ], 200);
        } else {
            return response()->json(['token' => null]);
        }
    }
}
