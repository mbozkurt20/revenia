<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\InvitationCodeRequest;
use App\Http\Requests\Auth\UpdateEmailRequest;
use App\Models\InvitationCode;
use App\Models\User\User;
use Illuminate\Http\JsonResponse;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    /**
     * @param InvitationCodeRequest $request
     * @return JsonResponse
     */
    public function invitationCode(InvitationCodeRequest $request): JsonResponse
    {
        if (!InvitationCode::where('code',$request->get('code'))->exists()) {
            return \ResponseJson::error('Invalid code');
        }

        // If you have this code in your invitation code, bring it.
       $invitationCode = InvitationCode::where('code',$request->get('code'))->first();

        try {
            User::create([
                'invitation_code' => $invitationCode->code,
            ]);

            // Delete the invitation code because it is assigned to the user.
            $invitationCode->delete();

            return \ResponseJson::success('User created');
        }catch (\Exception $e){
            return \ResponseJson::error($e->getMessage());
        }
    }

    /**
     * @param UpdateEmailRequest $request
     * @param $userID
     * @return JsonResponse
     */
    public function updateEmail(UpdateEmailRequest $request,$userID): JsonResponse
    {
        $user = User::where('id',$userID)
            ->where('invitation_code',$request->get('code'))
            ->first();

        if (!$user) {
            return \ResponseJson::error('Invalid code');
        }

        $user->update([
            'email' => $request->get('email'),
        ]);

        $token = JWTAuth::fromUser($user);

        return \ResponseJson::success('User updated', ['token' => $token]);
    }
}
