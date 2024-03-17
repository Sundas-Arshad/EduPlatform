<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "options".
 *
 * @property int $optionID
 * @property int|null $questionNo
 * @property string|null $option_text
 * @property int|null $is_correct
 *
 * @property Questions $questionNo0
 */
class Options extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'options';
    }

    /**
     * {@inheritdoc}
     */
   
        // Options.php
public function rules()
{
    return [
        [['questionNo'], 'integer'],
        [['option_text', 'is_correct'], 'string'],
        [['optionID'], 'unique'],
        [['questionNo'], 'exist', 'skipOnError' => true, 'targetClass' => Questions::class, 'targetAttribute' => ['questionNo' => 'QuestionNo']],
        [['is_correct'], 'in', 'range' => ['correct', 'incorrect']],
    ];
}


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'optionID' => 'Option ID',
            'questionNo' => 'Question No',
            'option_text' => 'Option Text',
            'is_correct' => 'Is Correct',
        ];
    }

    /**
     * Gets query for [[QuestionNo0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionNo0()
    {
        return $this->hasOne(Questions::class, ['QuestionNo' => 'questionNo']);
    }
}
