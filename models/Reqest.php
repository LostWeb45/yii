<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "reqest".
 *
 * @property int $id
 * @property int $id_film
 * @property int $id_user
 * @property string $date_req
 * @property int $id_status
 *
 * @property Films $film
 * @property Status $status
 * @property User $user
 */
class Reqest extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reqest';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_film', 'id_user', 'id_status'], 'required'],
            [['id_film', 'id_user', 'id_status'], 'integer'],
            [['date_req'], 'safe'],
            [['id_film'], 'exist', 'skipOnError' => true, 'targetClass' => Films::class, 'targetAttribute' => ['id_film' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_status'], 'exist', 'skipOnError' => true, 'targetClass' => Status::class, 'targetAttribute' => ['id_status' => 'id']],
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
            'id_user' => 'Id User',
            'date_req' => 'Date Req',
            'id_status' => 'Id Status',
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

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::class, ['id' => 'id_status']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
