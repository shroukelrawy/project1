<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'clientname',
        'phone',
        'email',
        'website',
        'city',
        'image',
        'active'
    ];
    public function getActiveStatus()
    {
        return $this->active ? 'Yes' : 'No';
    }
    public function getImagePath()
    {
        // Assuming your images are stored in the 'assets/images' directory
        return asset('assets/images/' . $this->image);
    }
}
