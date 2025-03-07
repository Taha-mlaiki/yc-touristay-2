<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** @use HasFactory<\Database\Factories\ImageFactory> */
    use HasFactory;
    protected $fillable = [
        "path",
        "announcement_id"
    ];
    public function announcement(){
        return $this->belongsTo(Announcement::class); 
    }
}
