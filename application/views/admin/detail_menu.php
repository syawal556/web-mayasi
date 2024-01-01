
    <?php echo form_open('Auth/update'); ?>
    <table class=" table table-bordered table-striped table-hover">
    <table cellpadding="6" cellspacing="1" style="width:100%" border="0">

<tr>
        <th width="85px">QTY</th>
        <th>Nama Menu</th>
        <th style="text-align:right">Harga</th>
        <th style="text-align:center">Total </th>
        <th style="text-align:right"> action</th>
        
</tr>

<?php $i = 1; ?>
<?php foreach ($this->cart->contents() as $items):   ?>
        <tr>
                <td><?php echo form_input(array('name' => $i.'[qty]', 'value' => $items['qty'], 'maxlength' => '3','min'=> '0', 'size' => '5','type' =>'number', 'class' => 'form-control')); ?></td>
                
                <td>
                        <?php echo $items['name']; ?>

                        <?php if ($this->cart->has_options($items['rowid']) == TRUE): ?>

                                <p>
                                        <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                                                <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />

                                        <?php endforeach; ?>
                                </p>

                        <?php endif; ?>

                </td>
                <td style="text-align:right">Rp. <?php echo number_format($items['price'], 0,',','.'); ?></td>
                <td style="text-align:right">Rp. <?php echo number_format($items['subtotal'], 0,',','.'); ?></td>
                <td style="text-align:right">
                    <a href="<?= base_url('Auth/delete/' . $items['rowid']) ?>" class="btn btn-danger btn-sm"><i data-feather="delete"></i></a>

                </td>
        </tr>

<?php $i++; ?>
<?php endforeach; ?>


<tr>
        <td colspan="2"> </td>
        <td class="right"><strong>Total Bayar</strong></td>
        <td class="right"><strong>Rp. <?php echo number_format($this->cart->total(), 0,',','.'); ?></strong></td>
</tr>

</table>
<button type="submit" class="btn btn-success btn-flat"><i data-feather="plus-circle"></i></button>
<a href="<?= base_url('Auth/clear'); ?>" class="btn btn-success btn-flat"><i data-feather="trash-2"></i></a>
<a href="<?= base_url('Auth/pembayaran'); ?>" class="btn btn-success btn-flat"><i data-feather="check-circle"></i></a>
<?php echo form_close(); ?>

</p>
</div>
</div>








