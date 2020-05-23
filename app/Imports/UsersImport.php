<?php

namespace App\Imports;

use App\User;
use App\Models\Admin\ThongTin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            $users = new User();
            $users->masv = $row[1];
            $users->name = $row[2];
            $users->password = \Hash::make('12345678');
            $users->save();
            $id = $users->id;
            $idUser = new ThongTin();
            $idUser->user_id = $id;
            $idUser->save();
        }
    }
}
