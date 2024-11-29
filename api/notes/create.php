<?php
    require('../../db/db.php');

    require_once('../../DAOs/NotesDAOMysql.php');

    header('Content-Type: application/json; charset=utf-8');


    $itens= [];

    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $itens['sucesso'] = true;

    
        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);


        if(isset($data['title'])){
        
            $noteDaoMysql = new NotesDAOMysql($pdo);
            
            $note =  new Notes();

            $note->setTitle($data['title']);

            $note->setBody($data['body']);


            $noteDaoMysql->add($note);


            echo json_encode(['sucesso'=> true, 'message'=>"Nota criada com sucesso"]);
            http_response_code(200);

        }else{
            echo json_encode(['sucesso'=>false,'message'=> 'Titulo não encontrado na requisição']);
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