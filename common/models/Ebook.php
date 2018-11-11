<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%ebook}}".
 *
 * @property string $id
 * @property string $name 书名
 * @property string $author 作者
 * @property string $cover 封面
 * @property int $type 分类
 * @property string $mark 备注信息
 * @property int $status 状态
 * @property string definition 清晰度
 * @property string find_info 资料地址
 * @property string $created_at
 * @property string $updated_at
 */
class Ebook extends \yii\db\ActiveRecord
{

    //分类
    const BOOK_TYPE_JSJ     = 100;
    const BOOK_TYPE_ZX      = 200;
    const BOOK_TYPE_SHKX    = 300;
    const BOOK_TYPE_WH      = 400;
    const BOOK_TYPE_JY      = 500;
    const BOOK_TYPE_WX      = 600;
    const BOOK_TYPE_YS      = 700;
    const BOOK_TYPE_ZRKX    = 800;
    const BOOK_TYPE_JS      = 900;
    const BOOK_TYPE_SEDU    = 101;
    const BOOK_TYPE_DZZJC   = 111;
    const BOOK_TYPE_KB      = 121;

    const BOOK_TYPE = [
        self::BOOK_TYPE_JSJ     => '计算机',
        self::BOOK_TYPE_ZX      => '哲学',
        self::BOOK_TYPE_SHKX    => '社会科学',
        self::BOOK_TYPE_WH      => '文化',
        self::BOOK_TYPE_JY      => '教育',
        self::BOOK_TYPE_WX      => '文学',
        self::BOOK_TYPE_YS      => '艺术',
        self::BOOK_TYPE_ZRKX    => '自然科学',
        self::BOOK_TYPE_JS      => '技术',
        self::BOOK_TYPE_SEDU    => '少儿读物',
        self::BOOK_TYPE_DZZJC   => '大中专教材',
        self::BOOK_TYPE_KB      => '课本'
    ];

    //状态
    const BOOK_STATUS_DEFAULT     = 1;
    const BOOK_STATUS_HAVING      = 2;
    const BOOK_STATUS_NOT_FIND    = 3;

    const BOOK_STATUS = [
        self::BOOK_STATUS_DEFAULT => '搜寻中..',
        self::BOOK_STATUS_HAVING => '已找到',
        self::BOOK_STATUS_NOT_FIND => '无',
    ];

    //清晰度
    const BOOK_DEFINITION_WG    = 'WG';
    const BOOK_DEFINITION_WP    = 'WP';
    const BOOK_DEFINITION_FG    = 'FG';
    const BOOK_DEFINITION_FB    = 'FB';
    const BOOK_DEFINITION_FQ    = 'FQ';

    const BOOK_DEFINITION = [
        self::BOOK_DEFINITION_WG    => '文字高清',
        self::BOOK_DEFINITION_WP    => '文字爬取',
        self::BOOK_DEFINITION_FG    => '翻印高清',
        self::BOOK_DEFINITION_FB    => '翻印标清',
        self::BOOK_DEFINITION_FQ    => '翻印清晰',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ebook}}';
    }

    /**
     * 自动更新时间
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'value'   => function(){return date('Y-m-d H:i:s',time());},
            ],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {

        return [
            [['name','author'], 'required'],
            [['type', 'status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 200],
            [['author'], 'string', 'max' => 60],
            [['cover', 'mark'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '书名',
            'author' => '作者',
            'cover' => '封面',
            'type' => '类型',
            'mark' => '描述',
            'status' => '状态',
            'definition' => '清晰度',
            'find_info' => '资料地址',
            'created_at' => '创建时间',
            'updated_at' => '修改时间',
        ];
    }
}
