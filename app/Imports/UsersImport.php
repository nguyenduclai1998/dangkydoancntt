<?php

namespace App\Imports;

use App\User;
use Illuminate\Validation\Rule;
use App\Models\Admin\ThongTin;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Validator;

class UsersImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   public function validate($data) {

        $msvs = [];
        // $emails
        foreach ($data as $key => $value) {
             array_push($msvs, $value[0]); 
             // array_push($emails, $value[])
        }

        if( count(array_unique($msvs)) != count($msvs) ) {
            return [
                'status' => false,
                'msg' => 'Ma sinh vien bi trung'
            ];
        }

        return ['status' => true];
   }
    public function collection(Collection $rows)
    {
            $validate = $this->validate($rows);

            if( !$validate['status'] ) {
                toastr()->error($validate['msg']);

                return;
            }
        
            try{
                \DB::beginTransaction();
                foreach ($rows as $row) 
                {
                    $user = User::create([
                        'name' => $row[1],
                        'password' => \Hash::make('12345678'),
                    ]);
                    $id = $user->id;
                    ThongTin::create([
                        'user_id' => $id,
                        'masv'    => $row[0],
                        'lop'     => $row[2],
                        'ghichu'  => $row[5]
                    ]);
                }

                \DB::commit();
                toastr()->success('Import thành công.');             
            } catch (\Exception $e) {
                \DB::rollback(); 
                toastr()->error('Import lỗi vui lòng kiểm tra định dạng file.'); 
            }
        
    }
}
