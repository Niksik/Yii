<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Issuedbooks]].
 *
 * @see Issuedbooks
 */
class IssuedbooksQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Issuedbooks[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Issuedbooks|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
