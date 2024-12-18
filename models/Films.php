<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $title
 * @property string $descr
 * @property string $img
 *
 * @property Reqest[] $reqests
 */
class Films extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'descr', 'img', 'id_genre'], 'required'],
            [['descr', 'img'], 'string'],
            [['title'], 'string', 'max'  => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'descr' => 'Descr',
            'id_genre' => 'Genre',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Reqests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReqests()
    {
        return $this->hasMany(Reqest::class, ['id_film' => 'id']);
    }
    public function getGenre()
    {
        return $this->hasOne(Genre::class, ['id' => 'id_genre']);
    }
}
