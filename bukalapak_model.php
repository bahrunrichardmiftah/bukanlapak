<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'try';
    public $timestamps = false;
    protected $primaryKey = 'design';
    
    public function up()
    {
        Schema::create('try', function (Blueprint $table) {
            $table->id('design');
            $table->string('spring');
            $table->text('office');
            $table->text('energy');
            $table->text('before');
            $table->text('marriage');
            $table->text('among');
        });
    }
}
