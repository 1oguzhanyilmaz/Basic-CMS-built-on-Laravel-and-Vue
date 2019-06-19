<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class BanUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'reason' => 'string',
        ];
    }

    public function banUser($id)
    {
        $user = User::find($id);

        $data = $this->all();

        if (!$user) {
            throw new \Exception('User not found');
        }

        //If user not admin
        if ($user->isAdmin()) {
            throw new \Exception('Cannot ban an admin');
        }

        //Set their role and status to banned
        $user->role = 9;
        $user->status = 0;
        $user->save();

        //If there was a reason passed in
        if (isset($data['reason']) && $data['reason']) {
            \UserLog::create([
                'user_id' => $user->id,
                'action' => 'banned',
                'reason' => $data['reason'],
            ]);
        } else {
            \UserLog::create([
                'user_id' => $user->id,
                'action' => 'banned',
            ]);
        }
    }
}
