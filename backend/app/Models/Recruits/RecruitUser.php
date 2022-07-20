<?php

namespace App\Models\Recruits;
use App\Models\Recruits\Recruit;
use App\Models\Chats\Room;
use App\Models\Chats\RoomUser;
use App\Models\Users\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Response;
use Exception;
use GuzzleHttp\Psr7\Request;

class RecruitUser extends Model
{
    use HasFactory,softDeletes;

    protected $fillable = [
        'recruit_id',
        'user_id',
    ];

    protected $table = "recruit_user";

    public static function create_recruit_user($request){

        try{

            $recruit_user = RecruitUser::create($request->all());
            $room_id = Recruit::select('room_id')->where('id',$recruit_user->recruit->id)->get();
            RoomUser::create([
                'room_id' => $room_id,
                'user_id' => $request->user_id
            ]);
            $result = 'success!';
            $status = Response::HTTP_OK;

        }catch(Exception $e){

            $result = $e;
            $status = Response::HTTP_BAD_REQUEST;

        }

        return [
            'result' => $result,
            'status' => $status,
        ];
    }

    public static function get_recruit_user($recruit_user){
        try{
            $recruit_user->name=User::find($recruit_user->user_id)->name;

            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => $recruit_user,
            'status' => $status
        ];
    }


    public static function delete_recruit_user($recruit_user){
        try{
            $recruit_user->delete();
            $status=Response::HTTP_OK;
        }catch(Exception $e){

            return [
                'result' => [],
                'status' => Response::HTTP_BAD_REQUEST
            ];

        }

        return [
            'result' => [],
            'status' => $status
        ];
    }
}
