<?php include('header.php'); ?>

<link rel="stylesheet" type="text/css" href="css/compte.css"/>

<div class="wrapper">
    <!-- Sidebar Holder -->
    <nav id="sidebar">

        <div class="sidebar-header">
            <?php echo "<h3>".$_SESSION['uti_prenom']." ".$_SESSION['uti_nom']."</h3>";?>
            <?php echo "<strong>".substr($_SESSION['uti_prenom'], 0, 1).substr($_SESSION['uti_nom'], 0, 1)."</strong>";?>
        </div>

        <ul class="list-unstyled components">
            <li>
                <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
                    <i class="glyphicon glyphicon-briefcase"></i>
                    Profil
                </a>
                <ul class="collapse list-unstyled" id="pageSubmenu">
                    <li><a href="#">Modifier email</a></li>
                    <li><a href="#">Modifier mot de passe</a></li>
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="glyphicon glyphicon-tasks"></i>
                    Matières
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="glyphicon glyphicon-comment"></i>
                    Messages privés
                </a>
            </li>
            <li class="active">
                <a href="accueil.php">
                    <i class="glyphicon glyphicon-home"></i>
                    Accueil
                </a>
            </li>
        </ul>

    </nav>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebar').hover(function () {
            $('#sidebar').toggleClass('active');
        });
        $('#sidebar').toggleClass('active');
    });
</script>
<?php include('footer.php'); ?>