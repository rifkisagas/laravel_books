<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function books(){
        try{
            $books = Book::all();

            return response()->json([
                'message' => 'success',
                'books' => $books,
            ], 200);
        } catch (Expection $e){
            return response()->json([
                'message' => 'Request failed'
            ], 401);
        }
    }

    public function create(Request $req){
        $validated = $req->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'cover' => 'image|file|max:2048'
        ]);

        if ($req->hasFile('cover')){
            $extension = $req->file('cover')->extension();

            $filename = 'cover_buku_'.time().'.'.$extension;

            $req->file('cover')->storeAs(
                'public/cover_buku', $filename
            );

            $validated['cover'] = $filename;
        }

        Book::create($validated);

        return response()->json([
            'message' => 'Buku berhasil ditambahkan',
            'book' => $validated,
        ], 200);        
    }

    public function update(Request $req, $id){
        $validated = $req->validate([
            'judul' => 'required|max:255',
            'penulis' => 'required',
            'tahun' => 'required',
            'penerbit' => 'required',
            'cover' => 'image|file|max:2048'
        ]);

        if ($req->hasFile('cover')){
            $extension = $req->file('cover')->extension();

            $filename = 'cover_buku_'.time().'.'.$extension;

            $req->file('cover')->storeAs(
                'public/cover_buku', $filename
            );

            $validated['cover'] = $filename;
        }
        
        $book = Book::find($id);
        Storage::delete('public/cover_buku/' . $book->cover);
        $book->update($validated);

        return response()->json([
            'message' => 'Buku berhasil diubah',
            'book' => $book,
        ],200);
    }
}
