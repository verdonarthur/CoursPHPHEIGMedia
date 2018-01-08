<?php
/* Smarty version 3.1.30, created on 2018-01-07 18:00:19
  from "/var/www/public/CoursPHPHEIGMedia/exercices9/exercice_9-1.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5a526033a7e5b7_72750249',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '11823256a2c824b1f8310d1b5db6f7daf0144326' => 
    array (
      0 => '/var/www/public/CoursPHPHEIGMedia/exercices9/exercice_9-1.tpl',
      1 => 1515348008,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5a526033a7e5b7_72750249 (Smarty_Internal_Template $_smarty_tpl) {
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
    
    <?php if (($_smarty_tpl->tpl_vars['tabOfQueryResult']->value != null)) {?>
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
   
    <?php }?>     
</table>
<p>Nombre total d'élément : <?php if (($_smarty_tpl->tpl_vars['tabOfQueryResult']->value != null)) {?> <?php echo count($_smarty_tpl->tpl_vars['tabOfQueryResult']->value);?>
 <?php } else { ?>  0<?php }?></p>
<?php }
}
