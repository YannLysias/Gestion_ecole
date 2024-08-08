<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToggleStatus extends Controller
{
    //TODO

    public function toggleUserStatus(Request $request, string $id)
    {
        //TODO

        $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        $deletedRow = User::where('id', $id)->update(['status', $status]);

        if ($deletedRow === 0) {
            return response()->json(["message" => "No user found with the specified ID"], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'User deleted successfully.'], Response::HTTP_OK);
    }
}
