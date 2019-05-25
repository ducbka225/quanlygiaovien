<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        
        $u = User::where('email', $row[2])->count('id');
            if($u == 0){
                return new User([
                'username'     => $row[0],
                'fullname'     => $row[1],
                'email'    => $row[2],
                'hocvi'    => $row[3],
                'phone'    => $row[4],
                'role'    => $row[5],
                'id_department'    => $row[6],
                'password' => \Hash::make('123123'),
                'avatar'    => 'avatar.png',
            ]);
        }
    }
}
