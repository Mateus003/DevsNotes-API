<?php
    require_once(__DIR__ . '/../Interfaces/NotesDAO.php');
    require_once(__DIR__ . '/../models/Note.php');


    class NotesDaoMysql implements NotesDao{
        private PDO $pdo;
        public function __construct($conn)
        {
            $this->pdo =  $conn;   
        }
        
        function add(Notes $n){
            $sql  = $this->pdo->prepare("
                INSERT INTO notes(title, body) values (:title, :body);
            ");

            $sql->bindValue(':title', $n->getTitle());
            $sql->bindValue(':body', $n->getBody());
            $sql->execute();
        }

        public function update(Notes $n)
        {
            $sql = $this->pdo->prepare("UPDATE  notes set title=:title, body=:body WHERE id = :id;");

            $sql->bindValue(':title', $n->getTitle());
            $sql->bindValue(':body', $n->getBody());
            $sql->bindValue(':id', $n->getId());
            $sql->execute();
        
        }

        function getById($id){

            $sql = $this->pdo->prepare("
            SELECT *
            FROM notes
            where id = :id
        ");
        
            $sql->bindParam(':id', $id );

            $sql->execute();

            return $sql->fetchAll(PDO::FETCH_ASSOC);

        }

        function delete($id){
            $sql = $this->pdo->prepare("
            DELETE from notes where id=:id;
            ");

            $sql->bindParam(':id', $id);

            $sql->execute();

        }

        function getAll(){

            $sql = $this->pdo->query("
                SELECT *
                FROM notes
            ");

            return $sql->fetchAll(PDO::FETCH_ASSOC);
            
        }


    }

?>