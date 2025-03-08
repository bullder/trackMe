<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Metrics\Chartable;
use Orchid\Screen\AsSource;

class Visitor extends Model
{
use HasFactory;
use AsSource;
use Filterable;
use Chartable;

    const CREATED_AT = 'at';
    const UPDATED_AT = null;

    protected $fillable = [
        'uid',
        'vid',
        'agent',
        'language',
        'url',
        'site',
        'ip'
    ];

    protected $allowedSorts = [
        'at'
    ];

    protected $allowedFilters = [
        'site' => Where::class,
        'at' => WhereDateStartEnd::class,
    ];
}









