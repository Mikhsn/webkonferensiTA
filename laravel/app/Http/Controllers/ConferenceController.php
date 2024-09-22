<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConferenceController extends Controller
{
    public function index()
    {
        $conferences = Conference::latest()->paginate(2);
        return view('conference.index', compact('conferences'));
    }

    public function create()
    {
        return view('conference.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required',
            'location' => 'required',
            'price' => 'required',
            'discount' => 'required',
        ]);

        $image = $request->file('image');
        $image->storeAs('public/conference', $image->hashName());

        Conference::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $image->hashName(),
            'date' => $request->date,
            'location' => $request->location,
            'price' => $request->price,
            'discount' => $request->discount,
        ]);

        return redirect('/conferences')->with('success', 'Conference Ditambahkan');
    }

    public function edit(Conference $conferences)
    {
        return view('conference.edit', compact('conferences'));
    }

    public function update(Request $request, Conference $conferences)
    {
        // Validasi input
        $this->validate($request, [
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'date' => 'required|date',
            'location' => 'required',
            'price' => 'required|numeric',
            'discount' => 'required',
        ]);

        // Cek apakah ada file gambar yang di-upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->hashName(); // Generate unique image name
            $image->storeAs('public/conference', $imageName); // Simpan file gambar

            // Hapus gambar lama dari storage jika ada
            if ($conferences->image) {
                Storage::delete('public/conference/' . $conferences->image);
            }

            // Update data conference dengan gambar baru
            $conferences->update([
                'title' => $request->title,
                'description' => $request->description,
                'image' => $imageName,
                'date' => $request->date,
                'location' => $request->location,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        } else {
            // Update data conference tanpa mengubah gambar
            $conferences->update([
                'title' => $request->title,
                'description' => $request->description,
                'date' => $request->date,
                'location' => $request->location,
                'price' => $request->price,
                'discount' => $request->discount,
            ]);
        }

        return redirect()->route('conferences.index')->with('success', 'Conference berhasil diupdate');
    }

    public function destroy(Conference $conferences)
    {
        $conferences->delete();
        if ($conferences) {
            return redirect()->route('conferences.index')->with('success', 'Conference berhasil dihapus');
        } else {
            return redirect()->route('conferences.index')->with('failed', 'Conference gagal dihapus');
        }
    }

    public function buyformember(){
        return view('member.buyconference');
    }

    public function buyforuser(){
        return view('user.buyconference');
    }
}

