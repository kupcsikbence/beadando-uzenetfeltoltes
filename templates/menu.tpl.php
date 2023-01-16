<?php //require_once('../logicals/session_helper.php'); ?>

<!-- 1. feladatpont: Az oldalon vízszintes menüt használjon. -->
<nav class="navbar fixed-top mb-5 navbar-expand-md navbar-dark bg-success">

    <button class="navbar-toggler" data-toggle="collapse" data-target="#collapse_target">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 6.e feladatpont -->
    <?php if( bejelentkezve() ) : ?>
        <div class="container">
            <span class="text-light">Bejelentkezve: <br>
                <?php echo $_SESSION['csaladinev'] . " " . $_SESSION['utonev'] . " (" . $_SESSION['loginnev'] . ")"; ?>
            </span>
        </div>
    <?php endif; ?> 
  
    <!--
    x, y
    1, 0    OK      ha be vanjelentkezve    NEM OK  ha nincs bejelentkezve
    0, 1    NEM OK  ha be van jelentkezve   OK      ha nincs bejelentkezve
    0, 0    NEM OK  ha be van jelentkezve   NEM OK  ha nincs bejelentkezve
    -->

    <div class="collapse navbar-collapse justify-content-end" id="collapse_target">
        <ul class="navbar-nav">
            <?php foreach ($oldalak as $oldal): ?>
                <!-- Ha be van jelentkezve -->
                <?php if ( bejelentkezve() ): ?>
                    <?php if( $oldal['menun'][0] == 1 ): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo APPROOT . "/pages/" . $oldal['fajl'] . ".php"; ?>">
                                <?php echo $oldal['szoveg']; ?>
                            </a>
                        </li>
                    <?php endif; ?>
                <!-- Ha nincs belentkezve -->
                <?php else: ?>
                    <?php if( $oldal['menun'][1] == 1 ): ?>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="<?php echo APPROOT . "/pages/" . $oldal['fajl'] . ".php"; ?>">
                                <?php echo $oldal['szoveg']; ?>
                            </a>
                        </li>
                    <?php endif; ?>                
                <?php endif; ?>
            <?php endforeach; ?>
      </ul>
    </div>
</nav>
