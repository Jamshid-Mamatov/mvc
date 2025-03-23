<?php

require_once(ROOT_PATH.'/core/Controller.php');
require_once(ROOT_PATH.'/app/Models/User.php');
class UserController extends Controller {
    public function show($id) {

        $userModel = new User();
        $user = $userModel->find($id);
        
        $this->render('users/show', [
            'user' => $user
        ]);
    }
}