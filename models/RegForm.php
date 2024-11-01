<?

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string|null $patronymic
 * @property string $login
 * @property string $email
 * @property string $password
 * @property int $id_role
 *
 * @property Reqest[] $reqests
 * @property Role $role
 */
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;

    public static function tableName()
    {
        return 'user';
    }

    public function rules()
    {
        return [
            [['name', 'surname', 'login', 'email', 'password', 'passwordConfirm', 'agree'], 'required'],
            [['id_role'], 'integer'],
            [['name', 'surname', 'patronymic', 'login', 'email', 'password'], 'string', 'max' => 255],
            [['login'], 'unique', 'message' => 'Такой логин уже есть'],
            [['email'], 'unique', 'message' => 'Такой email уже есть'],
            ['email', 'email', 'message' => 'Некорректная почта'],
            // ['name', 'match', 'pattern' => '/^[А-Яа-я]{5,}$/u', 'message' => 'Только кирилица'],
            // ['surname', 'match', 'pattern' => '/^[А-Яа-я]{5,}$/u', 'message' => 'Только кирилица'],
            // ['patronymic', 'match', 'pattern' => '/^[А-Яа-я]{5,}$/u', 'message' => 'Только кирилица'],
            // ['login', 'match', 'pattern' => '/^[A-Za-z0-9]{1,}$/u', 'message' => 'Только латиница и цифры'],
            ['password', 'string', 'min' => 3],
            ['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать'],
            ['agree', 'boolean'],
            ['agree', 'compare', 'compareValue' => true, 'message' => 'Необходимо согласиться для обработки ваших данных'],
            [['id_role'], 'exist', 'skipOnError' => true, 'targetClass' => Role::class, 'targetAttribute' => ['id_role' => 'id']],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'surname' => 'Фамилия',
            'patronymic' => 'Отчество',
            'login' => 'Логин',
            'email' => 'Почта',
            'password' => 'Пароль',
            'passwordConfirm' => 'Подтверждение пароля',
            'id_role' => 'Роль',
            'agree' => 'Согласие на обработку данных',
        ];
    }

    /**
     * Gets query for [[Reqests]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReqests()
    {
        return $this->hasMany(Reqest::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Role]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRole()
    {
        return $this->hasOne(Role::class, ['id' => 'id_role']);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }
}
