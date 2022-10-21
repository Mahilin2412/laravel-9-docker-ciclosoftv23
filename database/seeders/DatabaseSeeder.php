<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use App\Models\DocumentType;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //  \App\Models\User::factory(1)->create();
        $this->call(RoleSeeder::class);

        $userAdmin = new User;
        $userAdmin->IdUser = 121212;
        $userAdmin->FirstName = 'ADMIN';
        $userAdmin->SecondName = 'ADMIN';
        $userAdmin->FirstLastName = 'ADMIN';
        $userAdmin->SecondLastName = 'ADMIN';
        $userAdmin->email = 'admin@admin.com';
        $userAdmin->password = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi';
        $userAdmin->StatusUser = true;
        $userAdmin->save();
        $userAdmin->assignRole('Admin');

        $gender = new Gender;
        $gender1 = new Gender;
        $gender2 = new Gender;
        $gender->Name = 'Masculino';
        $gender->save();

        $gender1->Name = 'Femenino';
        $gender1->save();

        $gender2->Name = 'No Aplica';
        $gender2->save();



        $DocumentTypes = new DocumentType;
        $DocumentTypes1 = new DocumentType;
        $DocumentTypes2 = new DocumentType;
        $DocumentTypes3 = new DocumentType;
        $DocumentTypes->NameTypeDoc = 'Cedula';
        $DocumentTypes->AcroTypeDoc = 'CC';
        $DocumentTypes->FKIdUser = 121212;
        $DocumentTypes->save();

        $DocumentTypes1->NameTypeDoc = 'NIT';
        $DocumentTypes1->AcroTypeDoc = 'NI';
        $DocumentTypes1->FKIdUser = 121212;
        $DocumentTypes1->save();

        $DocumentTypes2->NameTypeDoc = 'Tarjeta Identidad';
        $DocumentTypes2->AcroTypeDoc = 'TI';
        $DocumentTypes2->FKIdUser = 121212;
        $DocumentTypes2->save();

        $DocumentTypes3->NameTypeDoc = 'Cedula Extranjera';
        $DocumentTypes3->AcroTypeDoc = 'CE';
        $DocumentTypes3->FKIdUser = 121212;
        $DocumentTypes3->save();

    }
}
