<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Http\Resources\AuthorCollection;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    private function isValid($request)
    {
        return $request->validate([
            'name' => 'required',
            'surname' => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('authors', ['authors' => Author::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('/author_add', ['author' => new Author]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isValid($request);
        $name = $request->input("name");
        $surname = $request->input("surname");

        //
        $author = new Author();
        $author->name = $name;
        $author->surname = $surname;
        $author->save();

        return redirect('/authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('/author', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        //
        return view('author_add', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $this->isValid($request);

        $name = $request->input('name');
        $surname = $request->input('surname');

        $author->name = $name;
        $author->surname = $surname;
        $author->save();

        return redirect('/authors');
    }

    public function delete(Author $author)
    {
        //
        return view('author_delete', ['author' => $author]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\r  $r
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $author->delete();

        return redirect('/authors');
    }

    // api
    public function createAuthor(Request $request)
    {
        $this->isValid($request);
        $name = $request->input("name");
        $surname = $request->input("surname");

        //
        $author = new Author();
        $author->name = $name;
        $author->surname = $surname;
        $author->save();

        return $author;
    }
    
    public function getAuthor(Request $request)
    {
        $id = $request->query("id");

        if($id)
        {
            return new AuthorCollection(Author::where("id", $id)->get());

        } else
        {
            return [];
        }
    }
}
