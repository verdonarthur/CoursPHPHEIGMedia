<?php
/* Smarty version 3.1.30, created on 2017-12-20 12:35:13
  from "/var/www/public/coursphp/exercices9/exercice_9-1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a3a59019d3a61_59808015',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '971484acc0fd0d17c744f0c8da1f79a79d18bb8a' => 
    array (
      0 => '/var/www/public/coursphp/exercices9/exercice_9-1.tpl',
      1 => 1513773411,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a3a59019d3a61_59808015 (Smarty_Internal_Template $_smarty_tpl) {
?>
<form action="" method="post">
    <fieldset>
        <legend>add record</legend>
        <input name="first_name" placeholder="first_name" type="text">
        <input name="last_name" placeholder="last_name" type="text">
        <input name="email" placeholder="email" type="email">
        <textarea name="notes" placeholder="notes"></textarea>
        <input type="submit" value="add">
    </fieldset>
</form>


<form action="" method="post">
    <fieldset>
        <legend>Search param</legend>
        <input type="text" name="search" placeholder="search">
        <select name="order" onchange="this.form.submit()">
            <option></option>
            <option value="1">Descendant</option>
            <option value="2">Ascendant</option>
        </select>
    </fieldset>
</form>

<table border="1">
    
    <?php echo $_smarty_tpl->tpl_vars['tabOfQueryResult']->value != null;?>

        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tabOfQueryResult']->value, 'contact');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['contact']->value) {
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->id;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->first_name;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->last_name;?>
</td>
            <td><a href='mailto:<?php echo $_smarty_tpl->tpl_vars['contact']->value->email;?>
'><?php echo $_smarty_tpl->tpl_vars['contact']->value->email;?>
</a></td>
            <td><?php echo $_smarty_tpl->tpl_vars['contact']->value->notes;?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
        
</table>
<p>Nombre total d'élément : <?php echo '<?php ';?>print($tabOfQueryResult != null ? count($tabOfQueryResult) : 0) <?php echo '?>';?></p>
<?php }
}
