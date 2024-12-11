<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $table = 'users'; // Confirme se o nome da tabela está correto

    protected $primaryKey = 'id'; // Chave primária da tabela

    public $incrementing = true; // Se a chave primária é auto-incrementada

    protected $keyType = 'int'; // Tipo da chave primária

    public $timestamps = true; // Se a tabela possui os campos created_at e updated_at

    protected $fillable = ['name', 'email', 'password']; // Colunas que podem ser atribuídas em massa

    protected $hidden = ['password','remember_token']; // Colunas que devem ser ocultadas

    protected function casts() {
        return [ 'email_verified_at' => 'datetime' , 'password' => 'hashed' ];
    }
}
