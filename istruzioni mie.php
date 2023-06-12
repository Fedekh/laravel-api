<?php

// creare tabella che si collega alla primary one to one
// 
// poi creare model della secondaria
// 
// php artisan create:model UserDetail
// 
// e dentro il model creare la funzione che si collega alla primary cosi:
// 
// public function user()
// {
//     return $this->belongsTo('User::class');
// }
// 
// e nel model User:
// 
// public function userDetail()
// {
//     return $this->hasOne('UserDetail::class');
// }

 <p>Indirizzo: {{Auth::user()->userDetail !==null ->address : '' }}:</p> diventa:
<p>Indirizzo: {{Auth::user()->userDetail?->address}}</p>
 <p>Telefono :: {{Auth::user()->userDetail?->phone}}</p>



// per relazione one to many
// il model della primary deve avere la funzione che si collega alla secondaria cosi:

//  public function posts() nel model categoy
// {    
//     return $this->hasMany('Post::class');
// }
// 
// e nel model della secondaria: nel model Post
//  
// public function category()
// {
//     return $this->belongsTo('Category::class');
// }
















