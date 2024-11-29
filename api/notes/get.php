<?php
    require('../../db/db.php');

    require_once('../../DAOs/NotesDAOMysql.php');


    header('Content-Type: application/json; charset=utf-8');


    $itens= [];

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        $itens['sucesso'] = true;

        $id = filter_input(INPUT_GET, 'id');

        $noteDaoMysql = new NotesDaoMysql($pdo);

        echo json_encode($noteDaoMysql->getById($id));
        http_response_code(200);
        
    }else{
        echo json_encode([
            'sucesso' => false,
            'message' => 'Método não permitido'
        ]);
        http_response_code(404);

    }
?>