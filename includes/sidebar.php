        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-virus"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Tests COVID-19</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
<?php if($_SESSION['aid']):?>


     <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>
            </li>

    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Gestion des employées</span>
                </a>
                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="add-phlebotomist.php">Ajouter nouveau employée  </a>
                         <a class="collapse-item" href="manage-phlebotomist.php"> Gestion des employées</a>
                    </div>
                </div>
            </li>


     <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-virus"></i>
                    <span>Résultats des tests</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-test.php"> Nouveau rendez-vous</a>
                        <a class="collapse-item" href="assigned-test.php"> Nouveaux tests</a>
                        <a class="collapse-item" href="ontheway-samplecollection-test.php"> Les demandes <br> d'aujourd'hui  </a>
                         <a class="collapse-item" href="sample-collected-test.php">  Les prélévements<br> effectués aujourd'hui  </a>
                           <a class="collapse-item" href="samplesent-lab-test.php"> Les prélévements envoyés  <br>au laboratoire  </a>
                            <a class="collapse-item" href="reportdelivered-test.php">Résultats</a>
 <a class="collapse-item" href="all-test.php"> Tous les tests</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefor"
                    aria-expanded="true" aria-controls="collapsefor">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>  Prendre un rendez-vous</span>
                </a>
                <div id="collapsefor" class="collapse" aria-labelledby="headingfor" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-user-testing.php">  Prendre un nouveau<br>rendez-vous</a>
                    </div>
                </div>
            </li>
   <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                    aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-file"></i>
                    <span>Les rapports</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="bwdates-report-ds.php"> Rechercher les rapports </a>
                         <a class="collapse-item" href="search-report.php"> Rechercher un rapport</a>
                         <a class="collapse-item" href="live-test-updates.php">Nombres de tests<br> par rapport au villes</a>
                         
                        </div>
                </div>
            </li>

<?php else:    ?>          
         

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
        Systèmes de gestion des tests
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Les résultats des tests</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="new-user-testing.php">  Prendre un nouveau<br> rendez-vous</a>
                        <a class="collapse-item" href="registered-user-testing.php">  Prendre un deuxième<br> rendez-vous</a>
                    </div>
                </div>
            </li>
 <li class="nav-item">
                <a class="nav-link" href="patient-search-report.php">
                    <i class="fas fa-fw fa-file"></i>
                    <span> Les rapports des résultats</span></a>
            </li>
         
<li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Page d'acceuil</span></a>
            </li>

<?php endif;    ?>          

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->