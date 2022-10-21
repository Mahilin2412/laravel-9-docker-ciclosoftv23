<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Customer extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $table='customers';
    protected $primaryKey='IdCustomer';
    protected $fillable=[
        'FirstNameCustomer','SecondNameCustomer', 'LastNameCustomer', 'SecondLastNameCustomer', 'password', 'mail', 'Address', 'AddressEntry', 'NumberPhone','FKIdThird','FKIdUser'
    ];

    public function third(){
        return $this->belongsTo('App\Models\Third','FKIdThird','IdThird');
    }

    public function users(){
        return $this->belongsTo('App\Models\User','FKIdUser','IdUser');
    }

    public static function storeCustomer(Request $request, $third){

        // SE VALIDA SI EL TERCERO YA EXISTE, SI YA EXISTE SE ACTUALIZA EL CAMPO ExistsProvider A TRUE
        if ($third){
            $upthird = Third::find($third->IdThird)->update([
                'ExistsProvider' => true
            ]);
            $idthird = $third->IdThird;
            $pro = Customer::where('FKIdThird', '=', $idthird)->first();
            if($pro){
                return redirect()->route('customers.create')->with([
                    'response' => 'Customer ya existe',
                    'status' => 'danger',
                    'icon' => 'block'//alert-outline
                ]);
            }else {
                $customer = Customer::create([
                    'FirstNameCustomer' => $request->FirstNameCustomer,
                    'SecondNameCustomer' => $request->SecondNameCustomer,
                    'LastNameCustomer' => $request->LastNameCustomer,
                    'SecondLastNameCustomer' => $request->SecondLastNameCustomer,
                    'password' => $request->password,
                    'mail' => $request->mail,
                    'Address' => $request->Address,
                    'AddressEntry' => $request->AddressEntry,
                    'NumberPhone' => $request->NumberPhone,
                    'FKIdThird' => $idthird,
                    'FKIdUser' => $request->FKIdUser
                ]);
            }
        }else{ // SI NO EXISTE EL TERCERO SE CREA CON EL CAMPO ExistsProvider EN TRUE Y EL ExistsCutomer EN FALSE
            $crethird = Third::create([
                'NumIdentification' => $request->NumIdentification,
                'FKIdTypeDoc' => $request->FKIdTypeDoc,
                'FirstNameThird' => $request->FirstNameCustomer,
                'SecondNameThird' => $request->SecondNameCustomer,
                'LastNameThird' => $request->LastNameCustomer,
                'SecondLastNameThird' => $request->SecondLastNameCustomer ,
                'NameComplete' => $request->NameComplete,
                'ExistsCutomer' => true,
                'ExistsProvider' => false,
                'FKIdGender' => $request->FKIdGender,
                'FKIdUser' => $request->FKIdUser
            ]);
            $third = Third::where('NumIdentification', '=', $request->NumIdentification)
                ->where('FKIdTypeDoc', '=' ,$request->FKIdTypeDoc)->first();
            $customer= Customer::create([
                'FirstNameCustomer' => $request->FirstNameCustomer,
                'SecondNameCustomer' => $request->SecondNameCustomer,
                'LastNameCustomer' => $request->LastNameCustomer,
                'SecondLastNameCustomer' => $request->SecondLastNameCustomer,
                'password' => $request->password,
                'mail' => $request->mail,
                'Address' => $request->Address,
                'AddressEntry' => $request->AddressEntry,
                'NumberPhone' => $request->NumberPhone,
                'FKIdThird' => $third->IdThird,
                'FKIdUser' => $request->FKIdUser
            ]);
        }
    }

    public static function updateCustomer(Request $request, $id){

        $third = Third::find($id)->update([
            'NumIdentification' => $request->NumIdentification,
            'FKIdTypeDoc' => $request->FKIdTypeDoc,
            'FirstNameThird' => $request->FirstNameCustomer,
            'SecondNameThird' => $request->SecondNameCustomer,
            'LastNameThird' => $request->LastNameCustomer,
            'SecondLastNameThird' => $request->SecondLastNameCustomer,
            'NameComplete' => $request->NameComplete,
            'FKIdGender' => $request->FKIdGender,
            'FKIdUser' => Auth::user()->IdUser
        ]);

        $customer = Customer::find($id)->update([
            'FirstNameCustomer' => $request->FirstNameCustomer,
            'SecondNameCustomer' => $request->SecondNameCustomer,
            'LastNameCustomer' => $request->LastNameCustomer,
            'SecondLastNameCustomer' => $request->SecondLastNameCustomer,
            'password' => $request->password,
            'mail' => $request->mail,
            'Address' => $request->Address,
            'AddressEntry' => $request->AddressEntry,
            'NumberPhone' => $request->NumberPhone,
            'FKIdUser' => Auth::user()->IdUser
        ]);
    }
}
