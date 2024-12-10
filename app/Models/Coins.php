<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// Schema::create('coins', function (Blueprint $table) {
//     $table->id();
//     $table->string('name', 255);
//     $table->string('stands', 255);
//     $table->string('api_endpoint', 255);
//     $table->string('image', 255);
//     $table->timestamps();
// });

class Coins extends Model
{
    //
    use HasFactory;

    protected $table = 'coins';
    protected $fillable = ['name', 'stands', 'api_endpoint', 'image'];

    public function getCoins()
    {
        return $this->all();
    }

    public function getCoin($id)
    {
        return $this->find($id);
    }

    public function addCoin($data)
    {
        return $this->create($data);
    }

    public function updateCoin($data, $id)
    {
        return $this->where('id', $id)->update($data);
    }
}
