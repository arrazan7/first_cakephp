<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * SaleTransaction Entity
 *
 * @property int $id
 * @property int $employee_id
 * @property int $customer_id
 * @property int $stock_id
 * @property int $price
 * @property int $quantity
 * @property int $total_price
 * @property \Cake\I18n\FrozenTime $transaction_date
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Employee $employee
 * @property \App\Model\Entity\Customer $customer
 * @property \App\Model\Entity\Stock $stock
 */
class SaleTransaction extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'customer_id' => true,
        'stock_id' => true,
        'price' => true,
        'quantity' => true,
        'total_price' => true,
        'transaction_date' => true,
        'created' => true,
        'modified' => true,
        'created_by' => true,
        'modified_by' => true,
        'employee' => true,
        'customer' => true,
        'stock' => true,
    ];

    protected $_virtual = ['full_description'];  // Menambahkan virtual field

    protected function _getFullDescription()
    {
        return 'Employee ID: ' . $this->modified_by . ' | Customer ID: ' . $this->customer_id . ' | Stock ID: ' . $this->stock_id . ' | Price: ' . $this->price . ' | Quantity: ' . $this->quantity . ' | Total Price: ' . $this->total_price . ' | Transaction Date: ' . $this->transaction_date;
    }
}
