<?php

require_once(ROOT_PATH.'/core/Model.php');

class User extends Model
{
    protected $table = 'users';

    public function all()
    {
        return parent::all();
    }

    public function find($id)
    {
        return parent::find($id);
    }

    public function create($data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return parent::create($data);
    }

    public function update($id, $data)
    {
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        return parent::update($id, $data);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }
}
?>