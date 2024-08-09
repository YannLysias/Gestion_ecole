<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ToggleStatus extends Controller
{
    /**
     * Toggle the status of a user.
     */
    public function toggleUserStatus(Request $request, string $id): JsonResponse
    {
        // Validate the status input
        $status = filter_var($request->status, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);

        if ($status === null) {
            return response()->json(["message" => "Invalid status value"], Response::HTTP_BAD_REQUEST);
        }

        // Update the user status
        $affectedRows = User::where('id', $id)->update(['status' => $status]);

        if ($affectedRows === 0) {
            return response()->json(["message" => "No user found with the specified ID"], Response::HTTP_NOT_FOUND);
        }

        return response()->json(['message' => 'User status updated successfully.'], Response::HTTP_OK);
    }
}
