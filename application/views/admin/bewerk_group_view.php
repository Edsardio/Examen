<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (!isset($_SESSION['user_id']) || $_SESSION['user_group'] != '2') {
	header('Location: ../home');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bewerk Gebruiker</title>
    <script src="<?= $this -> config -> base_url(); ?>/application/views/assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?= $this -> config -> base_url(); ?>application/views/assets/library/jquery.min.js"></script>

    <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!-- Site Properties -->
    <?php include 'layout/scripts.php' ?>

    <link rel="stylesheet" type="text/css" href="<?= $this -> config -> base_url(); ?>application/views/assets/library/Semantic/components/dropdown.css">
    <script>
        $(document).ready(function() {
            // fix menu when passed
            $('.masthead').visibility({
                once : false,
                onBottomPassed : function() {
                    $('.fixed.menu').transition('fade in');
                },
                onBottomPassedReverse : function() {
                    $('.fixed.menu').transition('fade out');
                }
            });
            // create sidebar and attach to menu open
            $('.ui.sidebar').sidebar('attach events', '.toc.item');

        });
    </script>
    <style>
        body {
            overflow: scroll;
        }
        .field > h5{
            float:left;
        }
        #headerpicture{
            background-color: transparent;
        }
        .column {
            max-width: 1000px;
            text-align: left;
            top: -550px;
        }
        #details {
            text-align: left;
        }
        .close{
            width: 100px;
            height: 36px;
        }
    </style>
</head>
<body class="pushable">
<?php include 'layout/menu_follow.php'; ?>
<div class="pusher" style="background-attachment:fixed; background-image:url('<?= $this->config->base_url(); ?>application/views/assets/img/sunset-sailing.jpg');">
    <!-- Modal Edit User -->
    <div id="headerpicture" class="ui inverted vertical masthead aligned segment">
        <?php
        include 'layout/menu_main.php';
        ?>
    </div>
    <div class="ui middle aligned center aligned grid">
        <div class="six wide column" style="margin-left: -34px;">
            <div class="ui segment">
                <h2>
                    Bewerk rechten voor gebruiker: <?=$voornaam;?> <?=$tussenvoegsel;?> <?=$achternaam;?>
                </h2>
            </div>
        </div>
        <div class="two wide right aligned column create_user">
            <center>
                <button onclick="location.href='<?= site_url('admin/Editgroups');?>'" class="ui large primary button">Annuleren</button>
            </center>
        </div>
        <div class="sixteen wide column">
            <div class="ui stacked segment">
                <?= form_open('admin/Editgroups/updateGroup', 'role="form" class="ui form"'); ?>
                <table class="ui fixed single line celled table">
                    <tr>
                        <td>Gebruikersnaam</td>
                        <td><?=$voornaam;?>&nbsp;<?= $tussenvoegsel?>&nbsp;<?= $achternaam ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?=$email;?></td>
                    </tr>
                    <tr>
                        <td>Group</td>
                        <td><?=$group_name;?></td>
                    </tr>
                </table>
                <div class="field">
                    <h5>Group ID</h5>
                    <b>Opmerking: Group_id: 1 = Klant, &nbsp; Group_id: 2 = Beheerder</b>
                    <input type="text" class="form-control" id="group_id" name="group_id" value="<?=$group_id;?>">
                </div>
                <input type="hidden" name="klant_id" value="<?= $klant_id; ?>" />
                <input type="submit" name="button" class="ui button primary" value="Opslaan">
                <button type="button" onclick="location.href='<?= site_url('admin/Editgroups');?>" class="ui button btn-success">Annuleren</button>
                </form>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
    <div class="ui middle aligned center aligned grid">
        <div class="column">
            <div class="ui header">
                <div id="details"></div>
                <div id="error"></div>
            </div>
        </div>
    </div>
</div>
</body>
</html>