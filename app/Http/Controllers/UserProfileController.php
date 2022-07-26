<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;

/**
 * Class UserProfileController
 * @package App\Http\Controllers
 */
class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userProfiles = UserProfile::paginate();

        return view('user-profile.index', compact('userProfiles'))
            ->with('i', (request()->input('page', 1) - 1) * $userProfiles->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userProfile = new UserProfile();
        return view('user-profile.create', compact('userProfile'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(UserProfile::$rules);

        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
		]);

		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('image');

		$nama_file = time()."_".$file->getClientOriginalName();

      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);

		UserProfile::create([
            'user_id' => $request->user_id,
            'full_name' => $request->full_name,
            'city' => $request->city,
			'image' => $nama_file,
		]);



        return redirect()->route('home')
            ->with('success', 'UserProfile created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $userProfile = UserProfile::find($id);
        return view('user-profile.show', compact('userProfile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userProfile = UserProfile::find($id);

        return view('user-profile.edit', compact('userProfile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  UserProfile $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserProfile $userProfile)
    {
        request()->validate(UserProfile::$rules);

        $userProfile->update($request->all());

        return redirect()->route('home')
            ->with('success', 'UserProfile updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $userProfile = UserProfile::find($id)->delete();

        return redirect()->route('user-profiles.index')
            ->with('success', 'UserProfile deleted successfully');
    }
}
