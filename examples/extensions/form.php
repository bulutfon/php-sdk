<?php
session_start();
require '../../vendor/autoload.php';
require_once '../helpers/variables.php';
require_once '../helpers/functions.php';

$token = getAccessTokenFromSession();

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $extension = $provider->getExtension($token, $id);
}
?>
<html>
<head>
    <?php if(isset($extension)) {?>
        <title> Update Extension - <?=$_GET['id']?></title>
    <?php } else {?>
        <title>Create Extension </title>
    <?php } ?>
</head>
<body>
<?php if(isset($extension)) {?>
    <h2> Update Extension - <?=$_GET['id']?></h2>
<?php } else {?>
    <h2>Create Extension </h2>
<?php } ?>
<form action="<?php echo isset($extension) ? "update.php?id=$id" : "create.php"?>" method="post">
    <table>
        <tr>
            <td>Full Name</td>
            <td><input name="full_name" type="text" value="<?= isset($extension) ? $extension->caller_name : '' ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input name="email" type="email" value="<?= isset($extension) ? $extension->email : '' ?>"></td>
        </tr>
        <tr>
            <td>Did</td>
            <td><input name="did" type="text" value="<?= isset($extension) ? $extension->did : '' ?>"></td>
        </tr>
        <tr>
            <td>Extension Number</td>
            <td><input name="number" type="text" value="<?= isset($extension) ? $extension->number : '' ?>"></td>
        </tr>

        <tr>
            <td>Voice Mail</td>
            <td>
                <input name="voicemail" type="radio" value="true" <?= isset($extension) && $extension->voice_mail ? 'checked' : '' ?>>YES
                <input name="voicemail" type="radio" value="false" <?= isset($extension) && !$extension->voice_mail ? 'checked' : '' ?>>NO
            </td>
        </tr>

        <tr>
            <td>Redirection Type</td>
            <td>
                <input name="redirection_type" type="radio" value="NONE" <?= isset($extension) && $extension->redirection_type == 'NONE' ? 'checked' : '' ?>>Never
                <input name="redirection_type" type="radio" value="UNREACHABLE" <?= isset($extension) && $extension->redirection_type == 'UNREACHABLE' ? 'checked' : '' ?>>When Unreachable
                <input name="redirection_type" type="radio" value="ALWAYS" <?= isset($extension) && $extension->redirection_type == 'ALWAYS' ? 'checked' : '' ?>>Always
            </td>
        </tr>

        <tr>
            <td>Destination Type</td>
            <td>
                <input name="destination_type" type="radio" value="EXTENSION" <?= isset($extension) && $extension->destination_type == 'EXTENSION' ? 'checked' : '' ?>>Extension
                <input name="destination_type" type="radio" value="GROUP" <?= isset($extension) && $extension->destination_type == 'GROUP' ? 'checked' : '' ?>>Group
                <input name="destination_type" type="radio" value="AUTOATTENDANT" <?= isset($extension) && $extension->destination_type == 'AUTOATTENDANT' ? 'checked' : '' ?>>Menu
                <input name="destination_type" type="radio" value="EXTERNAL" <?= isset($extension) && $extension->destination_type == 'EXTERNAL' ? 'checked' : '' ?>>External Number
            </td>
        </tr>

        <tr>
            <td>Destination Number</td>
            <td>
                <input name="destination_number" type="text" value="<?= isset($extension) ? $extension->destination_number : '' ?>">
            </td>
        </tr>

        <tr>
            <td>External Number</td>
            <td>
                <input name="external_number" type="text" value="<?= isset($extension) ? $extension->external_number : '' ?>">
            </td>
        </tr>

        <tr>
            <td>ACL</td>
            <td>
                <input type="checkbox" name="acl[]" value="domestic" <?= isset($extension) && in_array("domestic", $extension->acl) ? 'checked' : '' ?>>Domestic
                <input type="checkbox" name="acl[]" value="gsm" <?= isset($extension) && in_array("gsm", $extension->acl) ? 'checked' : '' ?>>Gsm
                <input type="checkbox" name="acl[]" value="international" <?= isset($extension) && in_array("international", $extension->acl) ? 'checked' : '' ?>>International
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="<?php echo isset($extension) ? "Update" : "Create" ?>">
            </td>
        </tr>
    </table>
</form>

</body>
</html>