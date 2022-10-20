<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Brian2694\Toastr\Facades\Toastr;

class UserManagementController extends Controller
{
    // index page
    public function index()
    {
        $user_table = User::all();
        return view ('usermanagement.usertable',compact('user_table'));
    }

    // update record
    public function updateRecord(Request $request)
    {
        DB::beginTransaction();
        try {
        
           $updateRecord = [
                'name' => $request->name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
           ];

           User::where("user_id", $request->user_id)->update($updateRecord);
           Toastr::success('Updated user successfully :)','Success');
           DB::commit();
           return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('fail, User Update :)','Error');
            return redirect()->back();
        }
    }

    /** delete record */
    public function deleteRecord(Request $request)
    {
        try {

            User::destroy($request->id);
            Toastr::success('User deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('User delete fail :)','Error');
            return redirect()->back();
        }
    }

    /** profile user */
    public function profileUser() {
        return view('usermanagement.userprofile');
    }
}
