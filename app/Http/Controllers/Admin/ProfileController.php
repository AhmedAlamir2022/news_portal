<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminUpdatePasswordRequest;
use App\Models\Admin;
use App\Traits\FileUploadTrait;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use FileUploadTrait;
    public function index()
    {
        $user = Auth::guard('admin')->user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['nullable', 'image', 'max:3000'],
            'name' => ['required', 'max:255'],
            'email' => ['required', 'max:255', 'email', 'unique:admins,email,'.Auth::guard('admin')->user()->id]
        ]);

        /** Handle image */
        $imagePath = $this->handleFileUpload($request, 'image', $request->old_image);
        /** Save updated datas */
        $admin = Admin::findOrFail($id);
        $admin->image = !empty($imagePath) ? $imagePath : $request->old_image;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->save();
        return redirect()->back()->with('success','Profile updated Successfull');
    }

    public function passwordUpdate(AdminUpdatePasswordRequest $request, string $id)
    {
        $admin = Admin::findOrFail($id);
        $admin->password = bcrypt($request->password);
        $admin->save();
        return redirect()->back()->with('success','Password Updated Successfull');
    }
}
