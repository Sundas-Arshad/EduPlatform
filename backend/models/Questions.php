<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "questions".
 *
 * @property int $QuestionNo
 * @property string|null $QuestionStatement
 * @property string|null $Hints
 * @property int|null $QuestionSet
 *
 * @property Options[] $options
 * @property QuestionSet $questionSet
 */
class Questions extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'questions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['QuestionNo'], 'required'],
            [['QuestionNo', 'QuestionSet'], 'integer'],
            [['QuestionStatement'], 'string', 'max' => 100],
            [['Hints'], 'string', 'max' => 45],
            [['QuestionNo'], 'unique'],
            [['QuestionSet'], 'exist', 'skipOnError' => true, 'targetClass' => QuestionSet::class, 'targetAttribute' => ['QuestionSet' => 'question_setID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'QuestionNo' => 'Question No',
            'QuestionStatement' => 'Question Statement',
            'Hints' => 'Hints',
            'QuestionSet' => 'Question Set',
        ];
    }

    /**
     * Gets query for [[Options]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOptions()
    {
        return $this->hasMany(Options::class, ['QuestionNumber' => 'QuestionNo']);
    }

    /**
     * Gets query for [[QuestionSet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionSet()
    {
        return $this->hasOne(QuestionSet::class, ['question_setID' => 'QuestionSet']);
    }
}
