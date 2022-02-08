<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
// use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboards.users.index');
    }

    public function profile()
    {
        return view('dashboards.users.profile');
    }
    
    public function settings()
    {
        return view('dashboards.users.settings');
    }

    public function updateInfo(Request $request)
    {
        $validator = \Validator::make($request->all(),[
            'nik' => 'required|regex:/^([0-9]*)$/|min:16|max:16|unique:users,nik,'.Auth::user()->id,
            'name' => 'required|string|max:255',
            'bio' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'status_perkawinan' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required|string|email:dns|max:255|unique:users,email,'.Auth::user()->id,
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|max:15|unique:users,phone,'.Auth::user()->id,

            
        ]);

        if ($validator->fails()) {
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            $query = User::find(Auth::user()->id)->update([
                'nik' => $request->nik,
                'name' => $request->name,
                'bio' => $request->bio,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'status_perkawinan' => $request->status_perkawinan,
                'jenis_kelamin' => $request->jenis_kelamin,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
            if (!$query) {
                return response()->json(['status'=>0, 'msg'=>'Something went wrong.']);
            }else {
                return response()->json(['status'=>1, 'msg'=>'Your profile info has been update successfuly.']);
            }
        }
    }

    public function updatePicture(Request $request)
    {
        $path = 'users/images/';
        $file = $request->file('user_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        // Upload New Image
        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status'=>0, 'msg' => 'Something went wrong, upload new picture failed!']);
        }else {
            // Get Old Picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if ($oldPicture != '') {
                if (\File::exists(public_path($path.$oldPicture))) {
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            // Update DB
            $update = User::find(Auth::user()->id)->update(['picture' => $new_name]);

            if (!$upload) {
                return response()->json(['status'=>0, 'msg' => 'Something went wrong, updating picture in db failed!']);
            }else {
                return response()->json(['status'=>1, 'msg' => 'Your profile picture has been update successfully']);
            }
        }
    }

    public function changePassword(Request $request)
    {
        // Validate Form
        $validator = \Validator::make($request->all(),[
            'oldpassword' => [
                'required', function($attribute, $value, $fail){
                    if (!\Hash::check($value, Auth::user()->password)) {
                        return $fail(__('The current password is incorrect'));
                    }
                },
                'min:8',
                'max:16'
            ],
            'newpassword' => 'required|min:8|max:16|',
            'cnewpassword' => 'required|same:newpassword'
        ],[
            'oldpassword.required'=> 'Enter your current password!',
            'oldpassword.min'=> 'New password must have atleast 8 characters!',
            'oldpassword.max'=> 'New password must not be greater than 16 characters!',
            'newpassword.required'=> 'Enter new password!',
            'newpassword.min'=> 'New password must have atleast 8 characters!',
            'newpassword.max'=> 'New password must not be greater than 16 characters!',
            'cnewpassword.required'=> 'ReEnte your new password!',
            'cnewpassword.same'=> 'New password and Confrim password bus match!',

        ]);

        if (!$validator->passes()) {
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else {
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if (!$update) {
                return response()->json(['status'=>0, 'msg'=>'Something went wrong, Failed to update password in db']);
            }else {
                return response()->json(['status'=>1, 'msg'=>'Your password has been changed succesfully']);
            }
        }
    }
}
