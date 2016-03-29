<?php namespace App;
 
 use Illuminate\Database\Eloquent\Model;
 
 
 class Article extends Model
 {
     
     protected $fillable = ['title', 'content', 'publisher_id'];
     
     public function publisher(){
     	return $this->belongsTo('App\Publisher');
     }

     public function authors(){
     	return $this->belongsToMany('App\Author');
     }
 }