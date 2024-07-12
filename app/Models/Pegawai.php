<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Pegawai extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getPegawaiUrlAttribute() {
        $imagePath = 'assets/images/pegawai/' . $this->image;
        
        if ($this->image && File::exists(public_path($imagePath))) {
            return asset($imagePath);
        }
        
        return asset('no-image.jpg');
    }
}
