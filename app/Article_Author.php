<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 
 class Article_Author extends Model
 {
     
     protected $fillable = ['article_id', 'author_id'];

     protected $table = "article_author";
     
 }