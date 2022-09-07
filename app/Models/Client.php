<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Endereco;
class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'sobrenome',
        'rg',
        'telefone',
        'email',
        'avatar',
        'cep',
        'rua',
        'numero',
        'complemento',
        'barrio',
        'cidade',
    ];

    
}
