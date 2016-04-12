<?php

use yii\db\Migration;
use yii\db\Expression;


class m160411_194653_initial extends Migration{
    public function up(){
        $firstnames = Array(
            "Mark",
            "Stephen",
            "Paul",
            "Paula",
            "Donna",
            "Elisabeth",
            "Andrea"
        );
        $lastnames = Array(
            "Abramson","Hoggarth",
        );
        $booknames = Array(
            "The Dead Key",
            "Cold Black Earth",
            "Jury Town",
            "The Altar Girl: A Prequel",  
        );
        
        $this->createTable('authors', array(
            'id' => 'pk',
            'firstname' => 'string NOT NULL',
            'lastname' => 'string NOT NULL',
        ));
        $this->createTable('books', array(
            'id' => 'pk',
            'name' => 'string NOT NULL',
            'date_create' => 'timestamp NOT NULL default CURRENT_TIMESTAMP',
            'date_update' => 'timestamp default CURRENT_TIMESTAMP',
            'preview' => 'string',
            'date' => 'timestamp NOT NULL',
            'author_id' => 'int(11)',
        ));

        $this->addForeignKey("books_author_id", "books", "author_id", "authors", "id", "CASCADE", "RESTRICT");


        $authors = Array();
        $books = Array();

        for( $i = 0; $i < count($firstnames); $i++ ){
            for( $j = 0; $j < count($lastnames); $j++ ){
                $authors[] = Array( $firstnames[$i], $lastnames[$j] );
            }
        }


        $this->batchInsert( "authors", Array("firstname", "lastname"), $authors );
    }
 
    public function down(){
        $this->dropTable('books');
        $this->dropTable('authors');
        
    }
}
