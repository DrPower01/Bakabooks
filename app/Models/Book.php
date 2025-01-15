<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Book extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'ISBN',
        'Library',
        'Title',
        'Author',
        'Publisher',
        'Year',
        'Genre',
        'Status',
        'Language',
        'Pages',
        'Quantity',
        'Description',
        'Image',
    ];

    // Define the attributes that should be searchable
    public function toSearchableArray()
    {
        return [
            'Title' => $this->Title,
            'Author' => $this->Author,
            'Publisher' => $this->Publisher,
            'ISBN' => $this->ISBN,
        ];
    }
}