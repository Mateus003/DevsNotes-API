<?php
    
    interface NotesDao{
        function add(Notes $n);

        function update(Notes $n);

        function getById($id);

        function delete($id);

        function getAll();



    }
?>