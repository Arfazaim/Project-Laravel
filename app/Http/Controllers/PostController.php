<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Prodi; // Ensure you have the Prodi model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF; // Import the PDF facade

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get posts
//        $posts = Post::latest()->paginate(5);
//        $prodis = Prodi::all();
        // Render view with posts and prodis
//        return view('posts.index', compact('posts', 'prodis'));

        $posts = Post::with('prodi')->paginate(10); // 10 adalah jumlah item per halaman
        return view('posts.index', compact('posts'));


    }

    public function downloadPDF()
    {
        $posts = Post::all(); // Fetch all posts (students)
        $pdf = PDF::loadView('posts.pdf', compact('posts')); // Create PDF from the view
        return $pdf->download('mahasiswa.pdf'); // Download the generated PDF
    }

    public function show($id)
    {
        $post = Post::findOrFail($id); // Fetch the student by ID
        $prodis = Prodi::all(); // Fetch all prodis for the view
        return view('posts.show', compact('post', 'prodis')); // Return the view with the student data and prodis
    }

    public function create()
    {
        $prodis = Prodi::all(); // Fetch all prodis for the form
        return view('posts.create', compact('prodis')); // Pass prodis to the create view
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'foto_mahasiswa' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nim' => 'required|string|max:20',
            'nama_mahasiswa' => 'required|string|max:255',
            'prodi_id' => 'required|exists:prodis,id', // Ensure prodi_id is valid
        ]);

        // Upload image
        $image = $request->file('foto_mahasiswa');
        $imagePath = $image->store('public/posts'); // Save image

        // Create post
        Post::create([
            'foto_mahasiswa' => $image->hashName(), // Save the image file name
            'nim' => $request->nim,
            'nama_mahasiswa' => $request->nama_mahasiswa,
            'prodi_id' => $request->prodi_id, // Save prodi_id
        ]);

        // Redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(Post $post)
    {
        $prodis = Prodi::all(); // Fetch all prodis for the form
        return view('posts.edit', compact('post', 'prodis')); // Pass post and prodis to the edit view
    }

    public function update(Request $request, Post $post)
    {
        // Validate form
        $request->validate([
            'foto_mahasiswa' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nim' => 'required|min:5',
            'nama_mahasiswa' => 'required|min:5',
            'prodi_id' => 'required|exists:prodis,id', // Ensure prodi_id is valid
        ]);

        // Check if image is uploaded
        if ($request->hasFile('foto_mahasiswa')) {
            // Upload new image
            $image = $request->file('foto_mahasiswa');
            $imagePath = $image->store('public/posts'); // Save image

            // Delete old image
            Storage::delete('public/posts/' . $post->foto_mahasiswa); // Ensure correct column name

            // Update post with new image
            $post->update([
                'foto_mahasiswa' => $image->hashName(),
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'prodi_id' => $request->prodi_id, // Save prodi_id
            ]);
        } else {
            // Update post without image
            $post->update([
                'nim' => $request->nim,
                'nama_mahasiswa' => $request->nama_mahasiswa,
                'prodi_id' => $request->prodi_id, // Save prodi_id
            ]);
        }

        // Redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy(Post $post)
    {
        // Delete image
        Storage::delete('public/posts/' . $post->foto_mahasiswa); // Ensure correct column name

        // Delete post
        $post->delete();

        // Redirect to index
        return redirect()->route('posts.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
