<?php


namespace backend\models;

use common\models\User;

//    use common\models\Payment;


class DashboardStat
{
    public $registeredUsers;
    public $waitingUsers;
    public $activeUsers;


    public function countUsers()
    {
        $this->registeredUsers = User::find()
            ->andWhere(['status' => 0])
            ->count();
        $this->waitingUsers = User::find()
            ->andWhere(['status' => 1])
            ->count();
        $this->activeUsers = User::find()
            ->andWhere(['status' => 2])
            ->count();
    }


}