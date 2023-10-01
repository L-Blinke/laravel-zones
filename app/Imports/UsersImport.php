<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Mail;
use App\Mail\OpenAccount;
use App\Mail\OpenAccountAdvice;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        if ($row['name'] !== null) {
            $password = Str::random(10);

            $user = User::factory(1)->create()->first();

            $user->id = $row['id'];$user->name = $row['name'];$user->surname = $row['surname'];$user->email = $row['email'];$user->cuil = $row['cuilcuit'];$user->privilege = $row['role'];
            (config('app.debug')) ? $user->password=bcrypt('1234'):$user->password=bcrypt($password);
            $user->save();

            (config('app.debug') == false && ($row['role'] != "Patient")) ? (Mail::to($user)->send(new OpenAccountAdvice())) : ((config('app.debug') == false) ? Mail::to($user)->send(new OpenAccount($password, ($row['role'] == "Accountant") ? backpack_url("login"):url("login"))):false);
        } else {
            return null;
        }
    }
}
