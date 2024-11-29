<?php
    require('../../db/db.php');
    require_once('../../DAOs/NotesDAOMysql.php');


    header('Content-Type: application/json; charset=utf-8');


    $itens= [];

    if($_SERVER['REQUEST_METHOD'] === 'DELETE'){

        $itens['sucesso'] = true;

    
      $id = filter_input(INPUT_GET, 'id');



        if(isset($id)){

            $notesDaoMysql = new NotesDaoMysql($pdo);

            $notesDaoMysql->delete($id);
          

            echo json_encode(['sucesso'=> true, 'message'=>"Nota com id $id excluída com sucesso"]);
            http_response_code(200);

        }else{
            echo json_encode(['sucesso'=>false,'message'=> 'id não encontrado']);
            http_response_code(400);

        }
        

    }else{
        echo json_encode([
            'sucesso' => false,
            'message' => 'Método não permitido'
        ]);
        http_response_code(404);

    }
?>