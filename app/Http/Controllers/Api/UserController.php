<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        return UserResource::collection(User::filter($request->all())
            ->get());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return UserResource
     */
    public function show($id)
    {
        return new UserResource(User::find($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return UserResource
     */
    public function update(Request $request, $id)
    {
        User::find($id)->update($request->validate([
            "first_name"=>'required',
            "last_name"=>'required',
            "phone_number"=>'required',
            "email"=>'required',
            "is_admin"=>'required',
        ]));

        return new UserResource(User::find($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return UserResource
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return new UserResource($user);

    }

    public function updateUserGeneralSettings(Request $request) {
        $validated = $request->validate([
            'first_name' => 'sometimes|nullable',
            'last_name' => 'sometimes|nullable',
            'email' => 'sometimes|nullable|email|unique:users,email,' . auth()->user()->id,
            'phone_number' => 'sometimes|nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $updateData = [];

        foreach ($validated as $key => $value) {
            if ($value) {
                $updateData[$key] = $value;
            }
        }

        return response()->json([
            'data' => new UserResource(auth()->user()->update($updateData))
        ]);
    }

    public function updateUserPassword(Request $request) {
        $validated = $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:9',
            'password_confirmation' => 'required|same:password',
        ]);

        if (!Hash::check($validated['old_password'], auth()->user()->password)) {
            return response()->json([
                'message' => 'Old password is incorrect',
            ],403);
        }

        auth()->user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return response()->json([
            'data' => new UserResource(auth()->user())
        ]);
    }

    public function handleUserAccountDelete(Request $request) {

        $validated = $request->validate([
            'password' => 'required',
        ]);

        $user = auth()->user();

        if (!Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'Password is incorrect',
            ],403);
        }

        $user->delete();

        return response()->json([
            'message' => 'Account deleted successfully',
        ]);

    }
}
