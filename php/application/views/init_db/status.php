<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf8">
	<title>DataBase Info Page</title>
	<style type="text/css">
	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		background-color: white;
		border: 1px solid #ccc;
		padding: 1px 5px;
		color: #888;
	}

	.container {
		float: left;
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
		width: 48.2%;
	}

	.inner-container {
		float: left;
		margin: 0px 10px 10px;
	}

	.left {
		width: 70%;
	}

	.right {
		width: 20%;
	}

	p {
		margin: 12px 15px 12px 15px;
	}

	p.pull-right {
		text-align: right;
	}

	.red-text {
		color: #ab4526;
	}

	/* "Borrowed" from bootstrap v3.3.2 */
	.btn {
		display:inline-block;
		padding:6px 12px;
		margin-bottom:0;
		font-size:14px;
		font-weight:400;
		line-height:1.42857143;
		text-align:center;
		white-space:nowrap;
		vertical-align:middle;
		-ms-touch-action:manipulation;
		touch-action:manipulation;
		cursor:pointer;
		-webkit-user-select:none;
		-moz-user-select:none;
		-ms-user-select:none;
		user-select:none;
		background-image:none;
		border:1px solid transparent;
		color:#fff;
		background-color:#d9534f;
		border-color:#d43f3a;
		text-decoration: none;
	}

	.btn:focus,.btn:hover{
		color:#fff;
		background-color:#c9302c;
		border-color:#ac2925
	}

	span.pass:after {
		color: green;
		content: "Pass";
	}

	span.fail:after {
		color: #ac2925;
		content: "Fail";
	}
	</style>
</head>
<body>
	<div class="container">
		<h1>DataBase Checks</h1>
		<div class="inner-container left">
			<p>Steps</p>
			<p>
				check_if_tables_exist<br>
				<code><?= $check_if_tables_exist["condition"] ?></code>
			</p>
			<p>
				check_for_partial_tables<br>
				<code><?= $check_for_partial_tables["condition"] ?></code>
			</p>
		</div>
		<div class="inner-container right">
			<p class="pull-right">Results</p>
			<p class="pull-right">
				&nbsp;<br>
				<span class="<?= $check_if_tables_exist["result"] ?>"></span>
			</p>
			<p class="pull-right">
				&nbsp;<br>
				<span class="<?= $check_for_partial_tables["result"] ?>"></span>
			</p>
		</div>
	</div>
	<div class="container">
		<h1>Initialize DataBase</h1>
		<p class="red-text">WARNING!</p>
		<p>Initializing would delete the current tables
		   and contents of your <code>tree_trail</code> database.<br>
		   Initialize anyway?</p>
		<p><a class="btn" href="">Sure! Go ahead.</a></p>
	</div>
</body>
</html>