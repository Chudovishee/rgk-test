<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 *
 * @property Authors $author
 */
class Books extends \yii\db\ActiveRecord
{
    public $previewFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_create', 'date_update', 'date'], 'safe'],
            [['author_id'], 'integer'],
            [['name', "preview"], 'string', 'max' => 255],
            [['previewFile'], 'file'],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::className(), 'targetAttribute' => ['author_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'date_create' => 'Дата добавления',
            'date_update' => 'Дата обновления',
            'preview' => 'Превью',
            'date' => 'Дата выхода',
            'author_id' => 'Автор',
            'authorName' => 'Автор',
        ];
    }
    public function upload()
    {
        if ($this->validate()) {
            if( $this->previewFile ){
                $this->preview = 'uploads/' . $this->previewFile->baseName . '.' . $this->previewFile->extension;
                $this->previewFile->saveAs( $this->preview );
            }
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Authors::className(), ['id' => 'author_id']);
    }

    public function getAuthorName(){
        if($this->author){
            return $this->author->fullName;
        }
    }

}
