<div id="layoutSidenav_nav">
    <?php $page = substr($_SERVER['SCRIPT_NAME'], strrpos($_SERVER['SCRIPT_NAME'],"/")+1); ?>

    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Funciones Principales</div>
                <a class="nav-link <?= $page == 'index.php' ? 'active':''?>" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Inicio
                </a>

                <?php if($_SESSION['auth_role'] == '2'): ?>
                <a class="nav-link  <?= $page == 'view-register.php' ? 'active':''?> " href="view-register.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuarios Activos
                </a>
                <?php endif; ?>

                <?php if($_SESSION['auth_role'] == '2'): ?>
                <a class="nav-link  <?= $page == 'view-block.php' ? 'active':''?> " href="view-block.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuarios Suspendidos
                </a>
                <?php endif; ?>

                
                <?php if($_SESSION['auth_role'] == '2'): ?>
                <a class="nav-link  <?= $page == 'view-visitas.php' ? 'active':''?> " href="view-visitas.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Administrar Visitas
                </a>
                <?php endif; ?>
                

               
                <div class="sb-sidenav-menu-heading">Funciones Complementarias</div>

                <?php if($_SESSION['auth_role'] == '1'): ?>
                <a class="nav-link collapsed  <?= $page == 'category-add.php' || $page == 'category-view.php' || $page == 'category-edit.php' ? 'active':''?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Categorias
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'category-add.php' || $page == 'category-view.php' || $page == 'category-edit.php' ? 'show':''?>" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link  <?= $page == 'category-add.php' ? 'active':''?>" href="category-add.php">Agregar Categorias</a>
                        <a class="nav-link <?= $page == 'category-view.php' || $page == 'category-edit.php' ? 'active':''?>" href="category-view.php">Ver Categorias</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'post-add.php' || $page == 'post-view.php' || $page == 'post-edit.php' ? 'active':''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePosts" aria-expanded="false" aria-controls="collapsePosts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Post
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'post-add.php' || $page == 'post-view.php' || $page == 'post-edit.php' ? 'show':''?>" id="collapsePosts" aria-labelledby="Posts" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'post-add.php' ? 'active':''?> " href="post-add.php">Agregar Posts</a>
                        <a class="nav-link <?= $page == 'post-view.php' || $page == 'post-edit.php' ? 'active':''?>" href="post-view.php">Ver Post</a>
                    </nav>
                </div>

                <a class="nav-link collapsed  <?= $page == 'efemeride-add.php' || $page == 'view-efemeride.php' || $page == 'efemeride-edit.php' ? 'active':''?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseEfemeride" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Efemerides
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'efemeride-add.php' || $page == 'view-efemeride.php' || $page == 'efemeride-edit.php' ? 'show':''?>" id="collapseEfemeride" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link  <?= $page == 'efemeride-add.php' ? 'active':''?>" href="efemeride-add.php">Agregar Efemeride</a>
                        <a class="nav-link <?= $page == 'view-efemeride.php' || $page == 'efemeride-edit.php' ? 'active':''?>" href="view-efemeride.php">Ver efemerides</a>
                    </nav>
                </div>

                <a class="nav-link collapsed  <?= $page == 'view-curiosity.php' || $page == 'curiosity-edit.php' ? 'active':''?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseCuriosity" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Dato Curioso
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'view-curiosity.php' || $page == 'curiosity-edit.php' ? 'show':''?>" id="collapseCuriosity" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'view-curiosity.php' || $page == 'curiosity-edit.php' ? 'active':''?>" href="view-curiosity.php">Ver y Modificar Dato curioso</a>
                    </nav>
                </div>

                <a class="nav-link collapsed <?= $page == 'artwork-add.php' || $page == 'artwork-view.php' || $page == 'artwork-edit.php' ? 'active':''?>" href="#" data-bs-toggle="collapse" data-bs-target="#collapseArt" aria-expanded="false" aria-controls="collapseArt">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Art
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'artwork-add.php' || $page == 'artwork-view.php' || $page == 'artwork-edit.php' ? 'show':''?>" id="collapseArt" aria-labelledby="Art" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'artwork-add.php' ? 'active':''?> " href="artwork-add.php">Agregar Imagen</a>
                        <a class="nav-link <?= $page == 'artwork-view.php' || $page == 'artwork-edit.php' ? 'active':''?>" href="artwork-view.php">Ver imagenes</a>
                    </nav>
                </div>
<!-- 
                <a class="nav-link collapsed  <?= $page == 'artwork-add.php' || $page == 'view-artwork.php' || $page == 'artwork-edit.php' ? 'active':''?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseArtwork" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Imagenes de Muestra
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'artwork-add.php' || $page == 'view-artwork.php' || $page == 'artwork-edit.php' ? 'show':''?>" id="collapseArtwork" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                    <a class="nav-link <?= $page == 'artwork-add.php' || $page == 'view-artwork.php' || $page == 'artwork-edit.php' ? 'active':''?>" href="view-artwork.php">Ver Imagenes</a>
                        <a class="nav-link <?= $page == 'artwork-add.php' || $page == 'view-artwork.php' || $page == 'artwork-edit.php' ? 'active':''?>" href="artwork-edit.php">Modificar Imagenes</a>
                    </nav>
                </div> -->
                <?php endif; ?>

                <?php if($_SESSION['auth_role'] == '2'): ?>
                <a class="nav-link collapsed  <?= $page == 'view-email.php' ? 'active':''?> " href="#" data-bs-toggle="collapse" data-bs-target="#collapseEmail" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                        Email
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse <?= $page == 'view-email.php' ? 'show':''?>" id="collapseEmail" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link <?= $page == 'view-email.php' ? 'active':''?>" href="view-email.php">Ver y Modificar Dato curioso</a>
                    </nav>
                </div>
                <?php endif; ?>



            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Iniciaste sesión:</div>
            <?= $_SESSION['auth_user']['user_name']; ?>
        </div>
    </nav>
</div>