<?php
//namespace app\controllers\UserController;

require __DIR__.'/../models/UserModel.php';
//use app\models\UserModel;


class UserController {
    private $model;
  

    public function __construct($db) {
      
        $this->model = new UserModel($db);
    }
   

    public function index() {
        header("content-type:application/json");
        $users = $this->model->getUsers();
        echo json_encode($users);
        // var_dump('gg');
        /*
        if(!empty($GLOBALS['susers'])){
            return $GLOBALS['susers'];
        }
        include __DIR__.'/../../resources/views/user_list.php';*/
    }

    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = [
                'username' => $username,
                'password' => $password,
            ];

            if ($this->model->addUser($data)) {
                header("content-type:application/json");
                echo json_encode(['message'=>'succesfuly']);
                /*header('Location:' . BASE_PATH);
                echo 'done' ;*/
            } else {
                //echo "Failed to add user.";
                header("content-type:application/json");
                echo json_encode(['message'=>'not succesfuly']);
            }
        }
    }

   /* public function showUsers() {
        $users = $this->model->getUsers();
        include '/../../resources/views/user_list.php';
    }*/

    public function deleteUser($id) {
        if ($this->model->deleteUser($id)) {
            header("content-type:application/json");
            echo json_encode(['message'=>'succesfuly']);
           /* echo "User deleted successfully!";
            header('Location:' . BASE_PATH);*/
        } else {
            //echo "Failed to delete user.";
            header("content-type:application/json");
            echo json_encode(['message'=>'not succesfuly']);
        }
    }

    public function updateUser($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $data = [
                'username' => $username,
                'password' => $password,
            ];

            if ($this->model->updateUser($id, $data)) {
                header("content-type:application/json");
            echo json_encode(['message'=>'succesfuly']);
              /*  echo "User updated successfully!";
                header('Location:' . BASE_PATH);*/
            } else {
              //  echo "Failed to update user.";
              header("content-type:application/json");
              echo json_encode(['message'=>'not succesfuly']);
            }
        } else {
            $user = $this->model->getUserById($id);
           // include __DIR__.'/../../resources/views/edit_user.php';
           echo json_encode($user);
        }
    }

    /*public function editUser($id) {
        $user = $this->model->getUserById($id);
       // include __DIR__.'/../../resources/views/edit_user.php';
       echo json_encode($user);
    }*/

    public function searchUsers($searchTerm) {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $susers= $this->model->searchUsers($searchTerm);
        header("content-type:application/json");
        echo json_encode($susers);
        //include __DIR__.'/../../resources/views/results.php';
      
        //include __DIR__.'/../views/user_list.php';
    }}

 /*public function ok(){
    header('Location:' . BASE_PATH);

 }*/




      /*
    public function showSearchedUsers($searchTerm) {
        $users = $this->model->searchUsers($searchTerm);
        include '../views/user_list.php';
    }  */
}
