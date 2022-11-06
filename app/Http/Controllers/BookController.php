<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Book;
use App\Models\Author;
use App\Models\AuthorBook;
use Illuminate\Http\Request;
use App\Http\Resources\BookCollection;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    private function isValid($request)
    {
        return $request->validate([
            'title' => 'required',
            'description' => 'required',
            'year' => 'required|int|min:1000|max:2030',
            'authors' => 'required'
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books', ['books' => Book::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
        return view('book_add', ['book' => new Book(), 'authors' => Author::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->isValid($request);

        $title = $request->input("title");
        $year = $request->input("year");
        $description = $request->input("description");
        $authors = $request->input("authors");

        //
        $book = new Book();
        $book->title = $title;
        $book->release = $year;
        $book->description = $description;
        $book->save();

        foreach($authors as $author)
        {
            $authorBook = new AuthorBook();
            $authorBook->author_id = $author;
            $authorBook->book_id = $book->id;
            $authorBook->save();
        }

        return redirect('/books');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('book', ['book' => $book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $author_array = [];
        foreach($book->authors as $author)
        {
            $author_array[] = $author->id;
        }
        $book->author_array = $author_array;
        //return $book->author_array;
        return view('book_add', ['book' => $book, 'authors' => Author::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->isValid($request);
        $title = $request->input("title");
        $year = $request->input("year");
        $description = $request->input("description");
        $authors = $request->input("authors");

        $book->title = $title;
        $book->release = $year;
        $book->description = $description;
        $book->save();

        $authorBooks = AuthorBook::where("book_id", $book->id)->delete();

        foreach($authors as $author)
        {
            $authorBook = new AuthorBook();
            $authorBook->author_id = $author;
            $authorBook->book_id = $book->id;
            $authorBook->save();
        }

        return redirect('/books');
    }

    public function delete(Book $book)
    {
        return view('book_delete', ['book' => $book]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {

        $book->delete();

        return redirect('/books');
    }

    // api
    public function getBooks(Request $request)
    {
        $id = $request->query("author_id");

        if($id)
        {
            $book = Book::select("books.*")
                        ->join("author_books", "author_books.book_id", "books.id")
                        ->join("authors", "authors.id", "author_books.author_id")
                        ->where("authors.id", $id)
                        ->get();
        } else
        {
            $book = Book::all();
        }

        return new BookCollection($book);
    }
}
