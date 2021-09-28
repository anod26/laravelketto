<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
//Autentikációt akarjuk használni itt:
use Auth;

class GalleryController extends Controller
{



	private $galeriak_tabla = 'galleries';
	private $fotok_tabla = 'photos';
    public function index(){

    	//$szoveg = 'Tesztelünk';

    	// A view/gallery mappából az index nevű fájlt jeleníti meg: 
    	// A compact metódussal lehet átadni a változót:
    	//return view('gallery/index', compact('szoveg'));
    	// ez a kis nyil egyébként lekérdezést jelent:
    	//tehát lekérdezzük az összes képet és továbbítjuk az index oldalnak:
    	$galleries = DB::table($this->galeriak_tabla)->get();
    	//átadjuk a galleries változót az index oldalnak:
    	return view('gallery/index', compact('galleries'));
    }




//Ezzel tudunk új galériát létrehozni:
public function create(){
    //Ha nincs bejelentkezve akkor visszairányítás a kellő helyre:
		if(!Auth::check()){

return \Redirect::route('gallery.index')->with('uzenet', 'Csak bejelentkezett felhasználó hozhat létre galériát!');

		}

    	return view('gallery/create');
}


//Ezzel lehet eltárolni a képgaléria adatait:
// Zárújelben: a Típus Request, a paraméter neve: $request
public function store(Request $request){

	// Ez azt jelenti hogy a $request paraméterből kiolvassuk a név azonosítójú beviteli mező értékét:
	$nev = $request->input('nev');
	$leiras = $request->input('leiras');
	
	$boritokep = $request->file('boritokep');
	$tulajdonos = 1;

	if($boritokep){
		//die('Oké');
		$fajlnev = $boritokep->getClientOriginalName();
		$boritokep->move(public_path('boritokepek'), $fajlnev);
	}else{
		die('Hiba történt');
	}
	//Beillesztés adatbázisba:
	DB::table($this->galeriak_tabla)->insert(

		[

			'name'=>$nev,
			'description'=>$leiras,
			'cover-image'=>$fajlnev,
			'owner_id'=>$tulajdonos	

		]

	);
	//átadunk egy message nevű session változót és a with azt jelenti hogy ezzel az üzenettel akarunk visszatérni az index oldalra
	return \Redirect::route('gallery.index')->with('uzenet', 'Sikeresen elkészült a Galéria!');

}



public function show($id){
	// le kell kérdezni az adott képgaléria adatait, magyarán az id-ját:
	// ez ugyanat mint az sql parancs..where id = $id
	// a first() azt jelenti hogy csak az első találat kell
 	$gallery = DB::table($this->galeriak_tabla)->where('id',$id)->first();
 	//és a fotokat is lekérdezzük:
	$photos = DB::table($this->fotok_tabla)->where('gallery_id',$id)->get();
	//majd végül a megjelenítés:
	//ez azt jelenti hogy a show.blade.php-t hívjuk meg:
	return view('gallery/show', compact('gallery','photos'));


}



}
