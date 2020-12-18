<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Enterprise extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = [ 'cnpj', 'razao_social', 'name', 'cep', 'Logradouro', 'number', 'phone', 'email', 'complemento', 'bairro', 'cidade', 'uf', 'segmento', 'inscricao_municipal', 'inscricao_estadual'];
}
