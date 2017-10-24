
<html>
<style>
td, tr, table
{
 border: 1px solid black;
 padding: 5px;
 width:700px;
}
form
{
 width:700px;
}
.error
{
 color: red;
}
</style>
<body>
<h1><a href="<?= base_url()?>">Phonebook</a></h1>

<? if ($update) { ?>

<?= form_open("Phonebook/updateentry/" . $entry['id']) ?>
<?= form_fieldset("Update Entry"); ?>
<?= form_label('First Name:', 'fname'); ?> <br>
<?= form_input(array('name' => 'fname',
 'id' => 'fname',
 'value' => $entry['fname'])); ?> <br>
<?= form_label('Last Name:', 'lname'); ?> <br>
<?= form_input(array('name' => 'lname',
 'id' => 'lname',
 'value' => $entry['lname'])); ?> <br>
<?= form_label('Phone Number:', 'phone'); ?> <br>
<?= form_input(array('name' => 'phone',
 'id' => 'phone',
 'value' => $entry['phone'])); ?> <br>
<?= form_label('E-mail:', 'email'); ?> <br>
<?= form_input(array('name' => 'email',
 'id' => 'email',
 'value' => $entry['email'])); ?> <br>
<?= form_submit('phonebooksubmit', 'Submit'); ?>
<?= form_fieldset_close(); ?>
<?= form_close() ?>

<? } ?>

<? if ($updateEntryInvalid) { ?>

<?= form_open("Phonebook/updateentry/" . $entry['id']) ?>
<?= form_fieldset("Update Entry"); ?>
<?= form_label('First Name:', 'fname'); ?> <br>
<?= form_input(array('name' => 'fname',
 'id' => 'fname',
 'value' => set_value('fname'))); ?> <br>
<?= form_error('fname'); ?>

<?= form_label('Last Name:', 'lname'); ?> <br>
<?= form_input(array('name' => 'lname',
 'id' => 'lname',
 'value' => set_value('lname'))); ?> <br>
<?= form_error('lname'); ?>

<?= form_label('Phone Number:', 'phone'); ?> <br>
<?= form_input(array('name' => 'phone',
 'id' => 'phone',
 'value' => set_value('phone'))); ?> <br>
<?= form_error('phone'); ?>

<?= form_label('E-mail:', 'email'); ?> <br>
<?= form_input(array('name' => 'email',
 'id' => 'email',
 'value' => set_value('email'))); ?> <br>
<?= form_error('email'); ?>

<?= form_submit('phonebooksubmit', 'Submit'); ?>
<?= form_fieldset_close(); ?>
<?= form_close() ?>

<? } ?>

<? if ($newentry) { ?>
<?= validation_errors(); ?>
<?= form_open('Phonebook/newentry') ?>
<?= form_fieldset("Add Entry") ?>
<?= form_label('First Name:', 'fname'); ?> <br>
<?= form_input(array('name' => 'fname',
 'id' => 'fname')); ?> <br>
<?= form_label('Last Name:', 'lname'); ?> <br>
<?= form_input(array('name' => 'lname',
 'id' => 'lname')); ?> <br>
<?= form_label('Phone Number:', 'phone'); ?> <br>
<?= form_input(array('name' => 'phone',
 'id' => 'phone')); ?> <br>
<?= form_label('E-mail:', 'email'); ?> <br>
<?= form_input(array('name' => 'email',
 'id' => 'email')); ?> <br>
<?= form_submit('phonebooksubmit', 'Submit'); ?>
<?= form_fieldset_close(); ?>
<?= form_close() ?>

<? } else { ?>

<p><a href="<?= base_url() ?>index.php?/Phonebook/addnew">Add new entry</a></p>

<? if ($newentryInvalid) { ?>
<?= validation_errors(); ?>
<?= form_open('Phonebook/newentry') ?>
<?= form_fieldset("Add Entry") ?>
<?= form_label('First Name:', 'fname'); ?> <br>
<?= form_input(array('name' => 'fname',
 'id' => 'fname')); ?> <br>

<?= form_label('Last Name:', 'lname'); ?> <br>
<?= form_input(array('name' => 'lname',
 'id' => 'lname')); ?> <br>

<?= form_label('Phone Number:', 'phone'); ?> <br>
<?= form_input(array('name' => 'phone',
 'id' => 'phone')); ?> <br>

<?= form_label('E-mail:', 'email'); ?> <br>
<?= form_input(array('name' => 'email',
 'id' => 'email')); ?> <br>

<?= form_submit('phonebooksubmit', 'Submit'); ?>
<?= form_fieldset_close(); ?>
<?= form_close() ?>
<? } ?>
<? } ?>

<table>
 <tr>
 <th>D</th>
 <th>U</th>
 <th>ID</th>
 <th>First Name</th>
 <th>Last Name</th>
 <th>Phone Number</th>
 <th>E-mail</th>
 </tr>
<? foreach ($listing as $row) { ?>
 <tr>
 <td><a href="<?= base_url() ?>index.php?/Phonebook/delete/<?= $row['id']?>">D</a></td>
 <td><a href="<?= base_url() ?>index.php?/Phonebook/update/<?= $row['id']?>">U</a></td>
 <td><?= $row['id']?></td>
 <td><?= $row['fname']?></td>
 <td><?= $row['lname']?></td>
 <td><?= $row['phone']?></td>
 <td><?= $row['email']?></td>
 </tr>
<? } ?>
</table>

</body>
</html>
