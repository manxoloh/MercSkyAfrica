<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\NotificationsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Notifications';
$this->params['breadcrumbs'][] = $this->title;
?>
<div>
	<fieldset>
		<legend>Game List</legend>
		<table class="table">
			<thead>
				<th>#</th>
				<th>Recipient</th>
				<th>Sender</th>
				<th>Notification</th>
				<th>Status</th>
				<th>Timestamp</th>
			</thead>
			<tbody>
				<tr ng-repeat="notification in notifications">
					<td>{{$index+1}}</td>
					<td>{{notification.recipient.username}}</td>
					<td>{{notification.sender.username}}</td>
					<td>{{notification.notication}}</td>
					<td>{{notification.status}}</td>
					<td>{{notification.timestamp}}</td>
				</tr>
			</tbody>
		</table>
	</fieldset>
</div>