<?php
    require('../../db/db.php');

    require_once('../../DAOs/NotesDAOMysql.php');

    header('Content-Type: application/json; charset=utf-8');


    $itens= [];

    if($_SERVER['REQUEST_METHOD'] === 'GET'){

        $itens['sucesso'] = true;


        $noteDaoMysql = new NotesDaoMysql($pdo);

            
        echo json_encode($noteDaoMysql->getAll());
            
        

    }else{
        echo json_encode([
            'sucesso' => false,
            'message' => 'Método não permitido'
        ]);
    }
?>