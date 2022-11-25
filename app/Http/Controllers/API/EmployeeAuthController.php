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
            $employee_code = Employee::where('user_id', $user->id)->pluck('employee_code')->first();
            if (!$user->is_project_manager) {
                return response()->json([
                    'token' => $user->createToken(time())->plainTextToken,
                    'employee_code' => $employee_code
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Auth Failed!',
                    'message' => "Can't access manager account!"
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Login Failed!',
                'message' => 'The credetials do not match!'
            ]);
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
        if ($user && Hash::check($request->password, $user->password)) {
            $employee_code = Employee::where('user_id', $user->id)->pluck('employee_code')->first();
            if (!$user->is_project_manager) {
                return response()->json([
                    'token' => $user->createToken(time())->plainTextToken,
                    'employee_code' => $employee_code
                ], 200);
            } else {
                return response()->json([
                    'status' => 'Auth failed',
                    'message' => "Can't access manager account!"
                ]);
            }
        } else {
            return response()->json([
                'status' => 'Login Failed!',
                'message' => 'The credetials do not match!'
            ]);
        }
    }
}
