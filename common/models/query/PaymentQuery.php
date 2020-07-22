<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Payment]].
 *
 * @see \common\models\Payment
 */
class PaymentQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Payment[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Payment|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function creator($userID)
    {
        return $this->andWhere(['created_by' => $userID]);
    }
}
