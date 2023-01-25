<?php

namespace App\Http\Livewire;

use App\Models\Study;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class SoapForm extends Component
{
    public $translation;
    public $bookName = null;
    public $book = null;
    public $chapter_id;
    public $verses = [];

    public $show = false;

    public $soap = null;
    public $title = "";
    public $verse = "";
    public $body = "";
    public $public = false;
    public $published = true;

    protected $queryString = ['translation', 'book', 'bookName', 'chapter_id'];
    protected $rules = [
        'title' => ['required', 'max:23', 'string'],
        'verse' => ['required', 'max:23', 'string'],
        'body' => ['required', 'string'],
        'public' => ['boolean'],
        'published' => ['boolean']
    ];

    public function mount(?Study $study = null, $show = false) {
        $this->translation = auth()->user()->bible_id;

        if($study->book_id !== null && $study->chapter_id !== null) {
            $this->book = $study->book_id;
            $this->chapter_id = $study->chapter_id;
            $this->bookName = $study->book_name;
            $this->title = $study->title;
            $this->verse = $study->verse;
            $this->body = $study->body;
            $this->public = $study->public;
            $this->published = $study->published;
            $this->soap = $study;
        }
    }

    public function enableEditMode() {
        $this->show = false;
    }

    public function updated($propertyName) {
        $this->validateOnly($propertyName);
        $this->dispatchBrowserEvent('contentChanged');
    }

    public function setTranslation($translation) {
        $this->translation = $translation;
    }

    public function setBook($id, $name) {
        $this->book = $id;
        $this->bookName = $name;
        $this->chapter_id = null;
        $this->verses = [];
    }

    public function setChapter($chapter) {
        $this->chapter_id = $chapter;
    }

    public function saveSoap()  {
        $data = $this->validate();

        if(! $this->soap) {
            $this->soap = auth()->user()->studies()->create([
                'title' => $data['title'],
                'verse' => $data['verse'],
                'body' => $data['body'],
                'public' => (bool)$data['public'],
                'published' => (bool)$data['published'],
                'book_id' => $this->book,
                'chapter_id' => $this->chapter_id,
                'book_name' => $this->bookName,
            ]);

            session()->flash('message', 'Successfully created your study');
            redirect(route('studies.show', ['study' => $this->soap]));
        } else {
            $this->soap->update([
                'title' => $data['title'],
                'verse' => $data['verse'],
                'body' => $data['body'],
                'public' => (bool)$data['public'],
                'published' => (bool)$data['published'],
                'book_id' => $this->book,
                'chapter_id' => $this->chapter_id,
                'book_name' => $this->bookName,
            ]);

            $this->show = true;
            session()->flash('message', 'Successfully updated your study');
        }
    }

    public function render()
    {
        $baseUrl = config('bibleapi.base_url');
        $translations = Http::get("{$baseUrl}/translations");
        $books = Http::get("{$baseUrl}/books");

        $chapters = [];
        if($this->book) {
            $chapters = Http::get("{$baseUrl}/books/{$this->book}/chapters");
        }

        if($this->chapter_id) {
            $this->verses = HTTP::get("{$baseUrl}/books/{$this->book}/chapters/{$this->chapter_id}", [
                'translation' => $this->translation
            ])->json();
        }

        return view('livewire.soap-form', [
            'translations' => $translations->json(),
            'books' => $books->json(),
            'chapters' => $chapters ? $chapters->json() : [],
            'verses' => $this->verses,
        ]);
    }
}
