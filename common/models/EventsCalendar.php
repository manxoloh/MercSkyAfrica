<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "events_calendar".
 *
 * @property int $event_id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $start_time
 * @property string $end_date
 * @property string $end_time
 * @property string $venue
 * @property int $event_type
 * @property int $created_by
 * @property string $created_at
 *
 * @property User $createdBy
 * @property EventTypes $eventType
 */
class EventsCalendar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'events_calendar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start_date', 'start_time', 'end_date', 'end_time', 'venue', 'event_type', 'created_by'], 'required'],
            [['description'], 'string'],
            [['start_date', 'start_time', 'end_date', 'end_time', 'created_at'], 'safe'],
            [['event_type', 'created_by'], 'integer'],
            [['title', 'venue'], 'string', 'max' => 255],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
            [['event_type'], 'exist', 'skipOnError' => true, 'targetClass' => EventTypes::className(), 'targetAttribute' => ['event_type' => 'event_type_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_id' => 'Event ID',
            'title' => 'Title',
            'description' => 'Description',
            'start_date' => 'Start Date',
            'start_time' => 'Start Time',
            'end_date' => 'End Date',
            'end_time' => 'End Time',
            'venue' => 'Venue',
            'event_type' => 'Event Type',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventType()
    {
        return $this->hasOne(EventTypes::className(), ['event_type_id' => 'event_type']);
    }
}
