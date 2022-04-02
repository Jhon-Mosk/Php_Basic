<form method="POST" enctype="multipart/form-data">
    <input type="text" name="arg1" value="<?= $arg1 ?>" autofocus>
    <select name="operation" selected="<? $operation ?>">
        <option value="add" <?php if ($_POST['operation'] === 'add') echo 'selected' ?>>+</option>
        <option value="subtract" <?php if ($_POST['operation'] === 'subtract') echo 'selected' ?>>-</option>
        <option value="multiply" <?php if ($_POST['operation'] === 'multiply') echo 'selected' ?>>*</option>
        <option value="divide" <?php if ($_POST['operation'] === 'divide') echo 'selected' ?>>/</option>
    </select>
    <input type="text" name="arg2" value="<?= $arg2 ?>">
    <input type="submit" value="=">
    <input type="text" name="result" value="<?= $result ?>" disabled>
</form>
