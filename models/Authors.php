<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 *
 * @property Books[] $books
 */
class Authors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'authors';
    }

    public static function getAuthors(){
        return self::find()->all();
    }
    public static function getAuthorsSelect(){
        $result = Array();
        $models = self::getAuthors();
        foreach( $models as $model ){
            $result[$model->id] = $model->fullName; 
        }
        return $result;
    }
    public static function getAuthorsNames(){
        $result = Array();
        $models = self::getAuthors();
        foreach ($models as $model){
            $result[] = $model->fullName; 
        }
        return $result;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname'], 'required'],
            [['firstname', 'lastname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'fullName' => "Имя",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['author_id' => 'id']);
    }

    public function getFullName() {
        return $this->firstname . ' ' . $this->lastname;
    }
}
