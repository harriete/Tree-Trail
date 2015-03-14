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
                <a class="navbar-brand" href="<?php echo base_url();?>dashboard">Admin Control Panel</a>
            </div>

            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                  <?php if($active === "dashboard"):
								echo '<li class="active">';
							else:
								echo "<li>"; 
							endif;
							echo anchor('dashboard', 'Dashboard'); 
							echo '</li>';
				  ?>
                  <?php if($isSuperAdmin):
								if($active === "manage_users"):
									echo '<li class="active">';
								else:
									echo "<li>"; 
								endif;
								echo anchor('manage_users', 'Manage Users');
								echo '</li>';
							endif;
					?>
                  <li>
                    <a href="/">Back to map</a>
                  </li>
                </ul>
				
				<ul class="nav navbar-nav navbar-right">
					{{#isLogin}}
					<li style="position: absolute; right: 0; top: 0;"><a href="<?= base_url('/logout'); ?>">Logout</a></li>
					{{/isLogin}}
					{{^isLogin}}
				</ul>
            </div>
        </nav>

