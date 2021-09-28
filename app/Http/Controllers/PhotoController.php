<?php
namespace App\Http\Controllers;
//echo "<pre>";
//var_dump($_SERVER);

use Illuminate\Http\Request;
use DB;
use Auth;
class PhotoController extends Controller
{

private $fotok_tabla = 'photos';

   //Ezzel tudunk új galériát létrehozni:
public function create($gallery_id){

	if(!Auth::check()){

return \Redirect::route('gallery.index')->with('uzenet', 'Csak bejelentkezett felhasználó hozhat létre galériát!');

		}


	
    	return view('photo/create', compact('gallery_id'));
}


//Ezzel lehet eltárolni a képgaléria adatait:
public function store(Request $request){

	$cim = $request->input('cim');
	$leiras = $request->input('leiras');
	$helyszin = $request->input('helyszin');	
	$kep = $request->file('kep');
	$galeria = $request->input('galeria');
	$tulajdonos = 1;

	if($kep){
		
		$fajlnev = $kep->getClientOriginalName();
		//hozzá kell fűzni a galéria azonosítót, ami a $galeria változóban van:
		$kep->move(public_path('fotok'.$galeria), $fajlnev);

			//Beillesztés adatbázisba:
		// itt hivatkozunk a kód elején lévő private $fotok_tabla = 'photos';-ra!
	    DB::table($this->fotok_tabla)->insert(

		[
			'title'=>$cim,
			'description'=>$leiras,
			'location'=>$helyszin,
			'image'=>$fajlnev,
			'gallery_id'=>$galeria,
			'owner_id'=>$tulajdonos	

		]

	);
	// át kell adni egy paramétert,(a galeria id-t) amit itt az array()-ben lehet
	    //itt egyébként gallery.show-t kéne beírni, de azzal nem müködik, csak ezzel a gallery.index-el:
	return \Redirect::route('gallery.index', array('id'=>$galeria))->with('uzenet', 'A fotó sikeresen feltöltve!');
 	


	}else{
    return \Redirect::route('gallery.index', array('id'=>$galeria))->with('uzenet', 'A fotó feltöltése nem sikerült!');

	}


}



public function details($id){
	$photos = "";
		// le kell kérdezni az adott képgaléria adatait, magyarán az id-ját:
	// ez ugyanat mint az sql parancs..where id = $id
	// a first() azt jelenti hogy csak az első találat kell
 	$photo = DB::table($this->fotok_tabla)->where('id',$id)->first();
 	//és a fotokat is lekérdezzük:
	//majd végül a megjelenítés:
	//ez azt jelenti hogy a show.blade.php-t hívjuk meg:
	return view('photo/details', compact('photo'));
}
}
