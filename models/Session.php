<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "session".
 *
 * @property int $id
 * @property int $id_film
 * @property int $price
 * @property string $date_pok
 * @property string $cenz
 *
 * @property Films $film
 */
class Session extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'session';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_film', 'price', 'date_pok', 'cenz'], 'required'],
            [['id_film', 'price'], 'integer'],
            [['date_pok'], 'safe'],
            [['cenz'], 'string', 'max' => 255],
            [['id_film'], 'exist', 'skipOnError' => true, 'targetClass' => Films::class, 'targetAttribute' => ['id_film' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_film' => 'Id Film',
            'price' => 'Price',
            'date_pok' => 'Date Pok',
            'cenz' => 'Cenz',
        ];
    }

    /**
     * Gets query for [[Film]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Films::class, ['id' => 'id_film']);
    }
}
