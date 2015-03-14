{{< layout }}

{{$ extra_styles }}
  <link rel="stylesheet" href="<?= base_url('static/node_modules/leaflet/dist/leaflet.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('static/css/statistics.css'); ?>">
{{/ extra_styles }}

{{$ extra_inline_styles }}
html, body, .content {
  position:relative;
  width : 100%;
  height: 100%;
  overflow-x:hidden;
}
body{
  padding-top: 50px;
}
{{/ extra_inline_styles }}

{{$ extra_content }} 
	<div class="stat-container">
		<form>
			<div class="row">
				<div class="col-lg-5 col-md-5 paddingLeftGamay">
					<div class="row">
						<div class="col-lg-12 col-md-12">
							<div class="input-group">
								<span class="input-group-addon">Select Type of Tree:</span>
								<select id="drop-generate" name="drop-generate" class="form-control">
								</select>
								<span class="input-group-btn">
									<button type="button" id="generate" class="btn btn-default btn-primary">GENERATE GRAPH</button>
								</span>
							</div>
						</div>
					</div>
					<div id="checkboxes">
					</div>					
				</div>
				&nbsp
				<div class="col-lg-7 col-md-7">
					
					<div class="text-center">
						<canvas id="canvas" height="450" width="600"></canvas>
					</div>
				</div>	
		
			</div>
		</form>
	</div>

{{/ extra_content }}

{{$ extra_libs }}
  <script src="<?= base_url('static/node_modules/requirejs/require.js'); ?>"></script>
  <script src="<?= base_url('static/scripts/statistics/Chart.min.js'); ?>"></script>  
{{/ extra_libs }}

{{$ extra_scripts }}
	<script src="<?= base_url('static/scripts/statistics/statistics.js'); ?>"></script>  
	<script>
	var rows = {{ num_rows }};
	var tempData = [];
	var data2 = [];
	var x = 0;
	{{# data}}{{# quantity}}tempData[x]={{.}}; x++;{{/ quantity}}{{/ data}}
	data2['quantity'] = tempData;
	tempData = [];
	x = 0;
	{{# data}}{{# name}}tempData[x]='{{.}}'; x++;{{/ name}}{{/ data}}
	data2['name'] = tempData;
	tempData = [];
	x = 0;
	{{# data}}{{# id}}tempData[x]={{.}}; x++;{{/ id}}{{/ data}}
	data2['id'] = tempData;
	tempData = [];
	x = 0;
	{{# data}}{{# types}}tempData[x]='{{.}}'; x++;{{/ types}}{{/ data}}
	data2['types'] = tempData;
	console.log(data2);
	for(x = 0 ;x < rows; x++) { addData(data2['quantity'][x],data2['name'][x],data2['id'][x],data2['types'][x]); }
	init();
	</script>
  {{/ extra_scripts }}


{{/ layout}}