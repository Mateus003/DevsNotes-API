<?php
    require('../../db/db.php');

    require_once('../../DAOs/NotesDAOMysql.php');

    header('Content-Type: application/json; charset=utf-8');

    $itens= [];

    if($_SERVER['REQUEST_METHOD'] === 'PUT'){

        $itens['sucesso'] = true;

        $id =  filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    
        $jsonData = file_get_contents('php://input');

        $data = json_decode($jsonData, true);

        try{

            if(isset($id)){
                $noteDaoMysql = new NotesDaoMysql($pdo);

                $note = new Notes();

                $note->setTitle($data['title']);

                $note->setBody($data['body']);

                $note->setId($id);

                $noteDaoMysql->update($note);

                echo json_encode(['sucesso'=> true, 'message'=>"Nota $id atualizada com sucesso"]);
                http_response_code(200);
      
    
            }else{
                echo json_encode(['sucesso'=>false,'message'=> "Parâmetro id não encontrado na requisição"]);
                http_response_code(400);
            }
            
        } 
        catch(Exception $e){
            echo $e;
        }
        
    
    }else{
        echo json_encode([
            'sucesso' => false,
            'message' => 'Método não permitido'
        ]);
        http_response_code(404);
    }  
?>