<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang diasosiasikan dengan Model.
     * Secara default Laravel akan menggunakan 'tasks'. Baris ini opsional jika nama Model tunggal
     * sesuai dengan nama tabel jamak.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Atribut yang dapat diisi (mass assignable).
     * Ini penting untuk keamanan (Mass Assignment Protection).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'due_date',
        'priority',
        'status',
    ];

    /**
     * Atribut yang harus diubah ke tipe data native saat diakses.
     * Ini akan memastikan due_date selalu berupa objek Carbon (tanggal/waktu Laravel).
     *
     * @var array<string, string>
     */
    protected $casts = [
        'due_date' => 'date',
    ];

    /**
     * Definisikan kolom timestamps (created_at dan updated_at).
     * Karena kita menggunakan kolom ini, setel nilainya ke true (nilai default).
     *
     * @var bool
     */
    public $timestamps = true;
}
