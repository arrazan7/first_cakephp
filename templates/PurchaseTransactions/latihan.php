<?php

/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\PurchaseTransaction> $purchaseTransactions
 */
?>
<div class="purchaseTransactions index content">
    <?= $this->Html->link(__('New Purchase Transaction'), ['action' => 'add'], ['class' => 'button float-right']) ?>

    <!-- Form untuk filter tanggal start dan end -->
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <fieldset>
        <legend><?= __('Filter by Date') ?></legend>
        <div>
            <?= $this->Form->control('start_date', [
                'type' => 'date',
                'label' => 'Start Date',
                'value' => $this->request->getQuery('start_date')
            ]) ?>
            <?= $this->Form->control('end_date', [
                'type' => 'date',
                'label' => 'End Date',
                'value' => $this->request->getQuery('end_date')
            ]) ?>
        </div>
    </fieldset>
    <?= $this->Form->button(__('Filter')) ?>
    <?= $this->Form->end() ?>

    <!-- Tampilkan rentang waktu jika ada filter -->
    <?php if (!empty($startDate) && !empty($endDate)): ?>
        <p style="margin-top: 20px;">Menampilkan data dari <?= h($startDate) ?> hingga <?= h($endDate) ?></p>
    <?php endif; ?>

    <h3><?= __('Purchase Transactions') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('employee_id') ?></th>
                    <th><?= $this->Paginator->sort('purchase_id') ?></th>
                    <th><?= $this->Paginator->sort('price') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('transaction_date') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchaseTransactions as $purchaseTransaction): ?>
                    <tr>
                        <td><?= $this->Number->format($purchaseTransaction->id) ?></td>
                        <td><?= $purchaseTransaction->has('employee') ? $this->Html->link($purchaseTransaction->employee->fullname, ['controller' => 'Employees', 'action' => 'view', $purchaseTransaction->employee->id]) : '' ?></td>
                        <td><?= $purchaseTransaction->has('purchase') ? $this->Html->link($purchaseTransaction->purchase->merk, ['controller' => 'Purchases', 'action' => 'view', $purchaseTransaction->purchase->id]) : '' ?></td>
                        <td><?= $this->Number->format($purchaseTransaction->price) ?></td>
                        <td><?= $this->Number->format($purchaseTransaction->quantity) ?></td>
                        <td><?= $this->Number->format($purchaseTransaction->total_price) ?></td>
                        <td><?= h($purchaseTransaction->transaction_date) ?></td>
                        <td><?= h($purchaseTransaction->created) ?></td>
                        <td><?= h($purchaseTransaction->modified) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $purchaseTransaction->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchaseTransaction->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchaseTransaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchaseTransaction->id)]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>