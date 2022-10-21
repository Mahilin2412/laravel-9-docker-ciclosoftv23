<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Provider extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='Providers';
    protected $primaryKey='IdProvider';
    protected $fillable=[
        'FirstNameProvider', 'SecondNameProvider', 'FirstLastNameProvider', 'SecondLastNameProvider', 'StatusProvider','FKIdThird','FKIdUser'
    ];

    public function third(){
        return $this->belongsTo('App\Models\Third','FKIdThird','IdThird');
    }

    public function users(){
        return $this->belongsTo('App\Models\User','FKIdUser','IdUser');
    }

    public static function storeProvider(Request $request, $third){

        // SE VALIDA SI EL TERCERO YA EXISTE, SI YA EXISTE SE ACTUALIZA EL CAMPO ExistsProvider A TRUE
        if ($third){
            $upthird = Third::find($third->IdThird)->update([
                'ExistsProvider' => true
            ]);
            $idthird = $third->IdThird;
            $pro = Provider::where('FKIdThird', '=', $idthird)->first();
            if($pro){
                return redirect()->route('providers.create')->with([
                    'response' => 'Proveedor ya existe',
                    'status' => 'danger',
                    'icon' => 'block'//alert-outline
                ]);
            }else {
                $provider = Provider::create([
                    'FirstNameProvider' => $request->FirstNameProvider,
                    'SecondNameProvider' => $request->SecondNameProvider,
                    'FirstLastNameProvider' => $request->FirstLastNameProvider,
                    'SecondLastNameProvider' => $request->SecondLastNameProvider,
                    'StatusProvider' => $request->StatusProvider,
                    'FKIdThird' => $idthird,
                    'FKIdUser' => $request->FKIdUser
                ]);
            }
        }else{ // SI NO EXISTE EL TERCERO SE CREA CON EL CAMPO ExistsProvider EN TRUE Y EL ExistsCutomer EN FALSE
            $crethird = Third::create([
                'NumIdentification' => $request->NumIdentification,
                'FKIdTypeDoc' => $request->FKIdTypeDoc,
                'FirstNameThird' => $request->FirstNameProvider,
                'SecondNameThird' => $request->SecondNameProvider,
                'LastNameThird' => $request->FirstLastNameProvider,
                'SecondLastNameThird' => $request->SecondLastNameProvider,
                'NameComplete' => $request->NameComplete,
                'ExistsCutomer' => false,
                'ExistsProvider' => true,
                'FKIdGender' => $request->FKIdGender,
                'FKIdUser' => $request->FKIdUser
            ]);
            $third = Third::where('NumIdentification', '=', $request->NumIdentification)
                ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();
            $provider= Provider::create([
                'FirstNameProvider' => $request->FirstNameProvider,
                'SecondNameProvider' => $request->SecondNameProvider,
                'FirstLastNameProvider' => $request->FirstLastNameProvider,
                'SecondLastNameProvider' => $request->SecondLastNameProvider,
                'StatusProvider' => $request->StatusProvider,
                'FKIdThird' => $third->IdThird,
                'FKIdUser' => $request->FKIdUser
            ]);
        }
    }

    public static function updateProvider(Request $request, $id){

        $third = Third::find($id)->update([
            'NumIdentification' => $request->NumIdentification,
            'FKIdTypeDoc' => $request->FKIdTypeDoc,
            'FirstNameThird' => $request->FirstNameProvider,
            'SecondNameThird' => $request->SecondNameProvider,
            'LastNameThird' => $request->FirstLastNameProvider,
            'SecondLastNameThird' => $request->SecondLastNameProvider,
            'NameComplete' => $request->NameComplete,
            'FKIdGender' => $request->FKIdGender,
            'FKIdUser' => Auth::user()->IdUser
        ]);

            $provider = Provider::find($id)->update([
                'FirstNameProvider' => $request->FirstNameProvider,
                'SecondNameProvider' => $request->SecondNameProvider,
                'FirstLastNameProvider' => $request->FirstLastNameProvider,
                'SecondLastNameProvider' => $request->SecondLastNameProvider,
                'StatusProvider' => $request->StatusProvider,
                'FKIdUser' => Auth::user()->IdUser
            ]);
        }

}
