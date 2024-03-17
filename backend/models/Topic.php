<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "topic".
 *
 * @property int $topicID
 * @property string $topic_title
 * @property string $topic_description
 * @property string $learning_target
 *
 * @property CourseTopics[] $courseTopics
 * @property Course[] $course
 * @property QuestionSet[] $questionSets
 */
class Topic extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'topic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['topic_title', 'topic_description', 'learning_target'], 'required'],
            [['topic_description', 'learning_target'], 'string'],
            [['topic_title'], 'string', 'max' => 45],
            [['topic_title'], 'unique'],
            [['course_code'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'topicID' => 'Topic ID',
            'topic_title' => 'Topic Title',
            'topic_description' => 'Topic Description',
            'learning_target' => 'Learning Target',
            'course_code' => 'Course Code'
        ];
    }

    /**
     * Gets query for [[CourseTopics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseTopics()
    {
        return $this->hasMany(CourseTopics::class, ['TopicID' => 'topicID']);
    }

    /**
     * Gets query for [[QuestionSets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getQuestionSets()
    {
        return $this->hasMany(QuestionSet::class, ['topicID' => 'topicID']);
    }
}
