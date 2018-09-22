<?php

namespace App\Repositories;

use App\Models\User;
use InfyOm\Generator\Common\BaseRepository;
use App\Http\Validators\UserValidator;

/**
 * Class ProjectRepository
 * @package App\Repositories
 * @version August 9, 2018, 7:36 am UTC
 *
 * @method Project findWithoutFail($id, $columns = ['*'])
 * @method Project find($id, $columns = ['*'])
 * @method Project first($columns = ['*'])
*/
class UserRepository extends BaseRepository
{
    use AppRepository;

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'type'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    public function listNormalUser()
    {
        return $this->model->where('type', User::TYPE_NORMAL)->pluck('name', 'id');
    }

    public function listAdminUser()
    {
        return $this->model->where('type', User::TYPE_ADMIN)
            ->where('id', '!=', \Auth::user()->id)
            ->pluck('name', 'id');
    }

    public function changeUserPermission($request)
    {
        $listBecomeAdmin  = $request->listBecomeAdmin;
        $listBecomeNormal = $request->listBecomeNormal;

        if (is_null($listBecomeNormal) && is_null($listBecomeAdmin)) {
            return [
                'success' => false,
                'message' => ''
            ];
        }
        $validated = $this->validateChangeUserPermission(['listBecomeAdmin' => $listBecomeAdmin, 'listBecomeNormal' => $listBecomeNormal]);
        if ($validated['status'] == STATUS_ERROR) {
            return [
                'success' => false,
                'message' => $validated['errors']
            ];
        }

        if (!is_null($listBecomeAdmin)) {
            $this->model->whereIn('id', $listBecomeAdmin)->update(['type' => User::TYPE_ADMIN]);
        }

        if (!is_null($listBecomeNormal)) {
            $this->model->whereIn('id', $listBecomeNormal)->update(['type' => User::TYPE_NORMAL]);
        }

        return [
            'success' => true,
            'message' => ''
        ];
    }

    public function validateChangeUserPermission($params)
    {
        $userValidator = new UserValidator();
        $validator = $this->checkValidator($params, $userValidator->validateChangePermission());

        if ($validator->fails()) {
            return ['status' => STATUS_ERROR, 'errors' => $validator->errors()];
        }
        return ['status' => STATUS_SUCCESS];
    }

    public function updateChatworkId($request)
    {
        $chatworkId = $request->chatworkId;
        if (is_null($chatworkId) || (string)$chatworkId == '')
            return ['status' => STATUS_ERROR];

        $this->model->where('id', \Auth::user()->id)->update(['chatwork_id' => (string)$chatworkId]);
        return ['status' => STATUS_SUCCESS];
    }
}
