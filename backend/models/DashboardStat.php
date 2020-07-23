<?php


    namespace backend\models;

    use common\models\User;
//    use common\models\Payment;


    class DashboardStat
    {
        public $firstTopCount;
        public $firstTopPercent;
        public $secondTopCount;
        public $secondTopPercent;
        public $thirdTopCount;
        public $thirdTopPercent;
        public $folders;


        public function countTop3()
        {
            //first
            $count_prev_month = Documents::find()->where(' YEAR(created_at) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(created_at) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $count_this_month = Documents::find()->where(' YEAR(created_at) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(created_at) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $this->firstTopPercent = ($count_prev_month != 0) ? ($count_this_month - $count_prev_month / $count_prev_month) * 100 : $count_this_month;
            $this->firstTopCount = Documents::find()->count();
            unset($count_prev_month, $count_this_month);
            //end second

            //second
            $count_prev_month = Questions::find()->where(' YEAR(created_at) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(created_at) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $count_this_month = Questions::find()->where(' YEAR(created_at) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(created_at) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $this->secondTopPercent = ($count_prev_month != 0) ? ($count_this_month - $count_prev_month / $count_prev_month) * 100 : $count_this_month;
            $this->secondTopCount = Questions::find()->count();
            unset($count_prev_month, $count_this_month);
            //end second

            //third
            $count_prev_month = News::find()->where(' YEAR(date) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(date) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $count_this_month = News::find()->where(' YEAR(date) = YEAR(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d")) AND MONTH(date) = MONTH(str_to_date("' . date("Y-m-d") . '", "%Y-%m-%d"))')->count();
            $this->thirdTopPercent = ($count_prev_month != 0) ? ($count_this_month - $count_prev_month / $count_prev_month) * 100 : $count_this_month;
            $this->thirdTopCount = News::find()->count();
            unset($count_prev_month, $count_this_month);
            //end third
            $this->folders = Folders::find()->joinWith(['documents'])->addSelect('folders.*, COUNT(`documents`.`id`) as matches')->groupBy('`id`')->orderBy('matches DESC')->limit(10)->all();
        }


    }