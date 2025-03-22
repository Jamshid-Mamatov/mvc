<?php

require_once(ROOT_PATH.'/core/Controller.php');

class UserController extends Controller {
    public function show($id) {
        // Fetch user data (we’ll add databases later)
        $user = ['id' => $id, 'name' => 'John Doe'];
        
        $this->render('users/show', [
            'user' => $user
        ]);
    }
}