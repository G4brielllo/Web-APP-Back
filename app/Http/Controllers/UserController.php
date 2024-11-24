<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }
    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|string',
            'logo' => 'nullable|string',
        ]);

        try {
            $user = User::findOrFail($id);
        } catch (\Exception $e) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        if ($validatedData['password']) {
            $user->password = bcrypt($validatedData['password']);
        }

        $user->logo = $validatedData['logo'] ?? null;

        try {
            $user->save();
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to update user'], 500);
        }

        return response()->json($user);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'User deleted'], 204);
    }

}
