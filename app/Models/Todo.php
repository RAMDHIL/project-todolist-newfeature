<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasUuids;
    protected $table = 'todos';
    protected $primarykey = 'id';
    protected $keytype = 'string';
    public $timestamp = true;
    protected $fillable = [
        'id',
        'todo',
        'programming_language'
    ];
}
