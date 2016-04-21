<?php

namespace Mega\Modules\User\Controllers\Api;

use Mega\Services\Core\Controller\Abstracts\ApiController;
use Mega\Modules\User\Tasks\ListAllUsersTask;
use Mega\Modules\User\Transformers\UserTransformer;

/**
 * Class ListAllUsersController.
 *
 * @author   Mahmoud Zalt <mahmoud@zalt.me>
 */
class ListAllUsersController extends ApiController
{
    /**
     * @return \Dingo\Api\Http\Response
     */
    public function handle(ListAllUsersTask $listAllUsersTask)
    {
        $users = $listAllUsersTask->run();

        return $this->response->paginator($users, new UserTransformer());
    }
}
