<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "event_types".
 *
 * @property int $event_type_id
 * @property string $event_type_name
 *
 * @property EventsCalendar[] $eventsCalendars
 */
class EventTypes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'event_types';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['event_type_name'], 'required'],
            [['event_type_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'event_type_id' => 'Event Type ID',
            'event_type_name' => 'Event Type Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEventsCalendars()
    {
        return $this->hasMany(EventsCalendar::className(), ['event_type' => 'event_type_id']);
    }
}
