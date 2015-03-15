{{< layout }}

{{$ extra_styles }}
	<link href="<?= base_url('static/scripts/about/carousel/style.css'); ?>" rel="stylesheet" type="text/css" />
	<link href="<?= base_url('static/css/about_page.css'); ?>" rel="stylesheet" type="text/css" />
{{/ extra_styles }}

{{$ extra_inline_styles }}
{{/ extra_inline_styles }}

{{$ extra_content }} 
    <body id="pageBody">
        <div id="decorative1" style="position:relative">
            <div class="container">

                <div class="divPanel headerArea">
                    <div class="row-fluid">
                        <div class="span12">

                            <div id="headerSeparator"></div>

                            <div id="divHeaderText" class="page-content">
                                <div id="divHeaderLine1">About Project TreeTrail</div><br />
                                <div></div><br />
                                <div></div>
                            </div>

                            <div id="headerSeparator2"></div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="contentOuterSeparator"></div>

        <div class="container" style="width:65%">

            <div class="divPanel page-content">

                <div class="row-fluid">

                        <div class="span12" id="divMain">

                           <hr style="margin:45px 0 15px" />

                            <h3><center><font color = "green">“Protecting the forests of Cebu.”</font></center></h3>
                            

                            <p align="left"><font color ="green">Project Tree Trail</font> is a web application which monitors the flora population of Cebu province. This is done through pinning badges at specific places where flora, whether it is abundant or scarce, is available. The following badges can be seen pinned on any location in the map and each of which has its corresponding indications:
                            </p>

                            </div>

                            
                            <p style="margin:170px 0px 0px 0px"><img src="<?= base_url('static/images/about/green.jpg'); ?>" class="img-rounded" style="float:left">  
                            <br></br><font color ="green">Abundant Badge</font>
                                <br>This badge indicates that there is abundant flora in the area.</br>
                            </p>
                           

                             <p style="margin:60px 0px 0px 0px"><img src="<?= base_url('static/images/about/yellow.jpg'); ?>" class="img-rounded"  style="float:left">  
                            <br><font color ="green">Average Badge</font>
                             
                                <br>This badge indicates that there is an average amount of flora in the area. Either it could be close to becoming scarce or close to becoming abundant. These areas especially need monitoring.</br>
                            </p>

                             <p style="margin:30px 0px 0px 0px"><img src="<?= base_url('static/images/about/red.jpg'); ?>" class="img-rounded" style="float:left"> 
                             <br><font color ="green">Scarce Badge</font>
                             </br>
                                This badge indicates that there is abundant flora in the area.
                            </p>

                            <br><br>
                             <p align="left">Users of this web application will be able to pin badges to any location, along with information such as the type of plants found in the area, how abundant/scarce the plantation in the area is, pictures, and many others.
                             </p>

                            <p align="left">    This project is in collaboration with the Provincial Environment and Natural Resources Office of Region VII and the University of San Carlos Applied Software Engineering class under Engr. Christine I. Gohetia.
                            </p>

                            <hr style="margin:10px 0 10px" />

                            <div class="lead">
                                <h3><font color ="green">Sponsors and Developers.</font></h3> 
                                <h4>We would like to thank the following sponsors:</h4>
                            </div>
                            <br />

                            <div class="list_carousel responsive">
                                <ul id="list_photos">
                                    <li><img src="<?= base_url('static/images/about/1.jpg'); ?>" class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/2.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/3.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/4.jpg'); ?>"  class="img-polaroid">  </li>
        							<li><img src="<?= base_url('static/images/about/5.jpg'); ?>"  class="img-polaroid">  </li>                            
                                    <li><img src="<?= base_url('static/images/about/6.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/7.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/8.jpg'); ?>"  class="img-polaroid">  </li>
        							<li><img src="<?= base_url('static/images/about/9.jpg'); ?>"  class="img-polaroid">  </li>
        							<li><img src="<?= base_url('static/images/about/10.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/11.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/12.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/13.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/14.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/15.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/16.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/17.jpg'); ?>"  class="img-polaroid">  </li>
                                    <li><img src="<?= base_url('static/images/about/18.jpg'); ?>"  class="img-polaroid">  </li>
                                </ul>
                            </div> 
        					
                            <hr style="margin:45px 0 10px" />
                            <!--footer-->
                        <div id = "footer">
                            <footer>
                                <div>
                                    <p><center><font color ="green">Inspired? Great!</font></center></p>
                                    <p><center><font color ="gray">You can email us at uscprojecttreetrail@gmail.com.</font></center></p>
                                    <p class = "small"><center><font color = "gray">Copyright © 2015 Project Tree Trail. All Rights Reserved.</font></center></p>
                                </div>
                            </footer>
                        </div>
                    </div>

                     <div id="footerInnerSeparator"></div>
                </div>
            </div>
        </div>
{{/ extra_content }}

{{$ extra_libs }}
{{/ extra_libs }}

{{$ extra_scripts }}
	<script src="<?= base_url('static/scripts/about/default.js'); ?>" type="text/javascript"></script>
	<script src="<?= base_url('static/scripts/about/carousel/jquery.carouFredSel-6.2.0-packed.js'); ?>" type="text/javascript"></script><script type="text/javascript">$('#list_photos').carouFredSel({ responsive: true, width: '100%', scroll: 2, items: {width: 320,visible: {min: 2, max: 6}} });</script>
{{/ extra_scripts }}


{{/ layout}}