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
    
    {if ($tabOfQueryResult != null)}
        {foreach $tabOfQueryResult as $contact}
            <tr>
            <td>{$contact->id}</td>
            <td>{$contact->first_name}</td>
            <td>{$contact->last_name}</td>
            <td><a href='mailto:{$contact->email}'>{$contact->email}</a></td>
            <td>{$contact->notes}</td>
            </tr>
        {/foreach}   
    {/if}     
</table>
<p>Nombre total d'élément : {if ($tabOfQueryResult != null)} {$tabOfQueryResult|@count} {else}  0{/if}</p>
