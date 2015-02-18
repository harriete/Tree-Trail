    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url();?>/index.php/dashboard">Admin Control Panel</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <?php if($active === "dashboard") echo '<li class="active">';
                        else echo "<li>"; 
                        echo anchor('dashboard', 'Dashboard'); ?>
                  </li>
                  <?php if($active === "manage_users") echo '<li class="active">';
                        else echo "<li>"; 
                        echo anchor('manage_users', 'Manage Users'); ?>
                  </li>
                  <li>
                    <a><i></i>Etc</a>
                  </li>
                </ul>
            </div>
        </nav>

