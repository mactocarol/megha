<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="utf-8">

  <title>Game</title>

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta name="description" content="">

  <meta name="author" content="">
	

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/style.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/font-awesome.min.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/animate.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/nyroModal.css" rel="stylesheet">
	<link href="<?php echo base_url(); ?>css/thumbs2.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>css/thumbnail-slider.css" rel="stylesheet" />
    

  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	
  <!--[if lt IE 9]>

    <script src="js/html5shiv.js"></script>

  <![endif]-->



  <!-- Fav and touch icons -->

  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo base_url(); ?>img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo base_url(); ?>img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo base_url(); ?>img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo base_url(); ?>img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="<?php echo base_url(); ?>img/favicon.png">

    <style>
    
    #question-list > li {
        border-bottom: 1px dashed #e6e6e6;
        color: #000;
        margin: 0;
        padding: 5px 10px;
        width: 100%;
    }
    #question-list a {
        color: #666;
    }
    #question-list {
        background: #fff none repeat scroll 0 0;
        float: left;
        height: 165px;
        list-style: outside none none;
        margin-top: -3px;
        overflow-x: scroll;
        position: absolute;
        width: 100%;
        z-index: 9999;
    }
    </style>

	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  

	<script type="text/javascript" src="<?php echo base_url(); ?>js/app.js"></script>
	<!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	
	<script src="<?php echo base_url(); ?>js/thumbnail-slider.js" type="text/javascript"></script>

	<!--<script type="text/javascript" src="<?php //echo base_url(); ?>js/jquery.min.js"></script>-->

	<script type="text/javascript" src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/scripts.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.scrollTo.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>js/wow.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.nyroModal.custom.js"></script>
	
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.validate.js"></script>
	<script>
    // AJAX call for autocomplete 
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            var key = $(this).val();
            //alert(key.length);
            if(key.length < 3){
                return false;
            }
            $.ajax({
            type: "POST",
            url: "<?php echo site_url('browse/search_market');?>",
            data:'keyword='+$(this).val(),
            beforeSend: function(){
                $("#search-box").css("background"," url(LoaderIcon.gif) no-repeat 165px");
            },
            success: function(data){
                $("#suggesstion-box").show();
                $("#suggesstion-box").html(data);
                //$("#search-box").css("background","#FFF");
            }
            });
        });
    });
    </script>
	<!--<div id="google_translate_element"></div>
	<script type="text/javascript">
function googleTranslateElementInit() {
  new google.translate.TranslateElement({pageLanguage: 'en', layout: google.translate.TranslateElement.InlineLayout.SIMPLE}, 'google_translate_element');
}
</script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>-->

</head>

<!--  wow fadeInUp"  data-wow-duration="2s"-->

<body  ng-app="">

<!-- menu-->


<?php $id = $this->session->userdata('id'); if($id != '') { 
	  $balance = $this->session->userdata('balance');
	  //$invested = $this->session->userdata('invested');
	  $invested = $this->wallet->get_invested($id);
	  ///print_r($invested);
	  $this->wallet->get_updated_gainLoss($id);
	  $gain_loss = $this->session->userdata('gain_loss');
?>
<div class="top-menu">
    <div class="container">
	<div class="pull-right">
    	<ul>
            <li><span>UP/DOWN</span> <a href="" class="btn btn-success btn-xs"><?php if($gain_loss != ''){ echo $this->sports->showBucks($gain_loss); }else{ echo '$ 0.00';} ?></a></li>
            <li><span	>INVESTED</span> <a href="" class="btn btn-success btn-xs" style="background:#FF0;border-color:#ff0; color:#000"><?php if($invested != ''){ echo $this->sports->showBucks($invested); }else{ echo '$ 0.00';} ?></a></li>
            <li><span>AVAILABLE</span> <a href="" <?php if($balance < 10 ){ echo 'class="btn btn-danger btn-xs"'; } else { echo 'class="btn btn-success btn-xs"'; } ?> ><?php if($balance != ''){ echo $this->sports->showBucks($balance); }else{ echo '$ 0.00';} ?></a></li>
            <li><a href="<?php echo base_url(); ?>funds" class="btn btn-danger btn-xs" style="background:#58B231; border-color:#58B231;">FUNDS</a></li>
            <li class="input-top"><form method="POST" action=""><input class="form-control input-sm" id="search-box" placeholder="Search Markets" type="text"><div id="suggesstion-box"></div></form></li>
        </ul>
    </div>
    </div>
</div>
<?php } ?>
<nav class="navbar navbar-default menubar">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <?php if(($this->session->userdata('id'))){ ?>      
       <a class="navbar-brand" href="<?php echo base_url('myshare'); ?>"><img src="<?php echo base_url(); ?>img/logo1.png" class="img-responsive"></a>
       <?php } else { ?>
       <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo1.png" class="img-responsive"></a>
       <?php } ?>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav navbar-right">                        
        <li class="dropdown">
        <a href="<?php echo base_url();?>browse/featured" class="dropdown-toggle" type="button" id="dropdownMenu1" aria-haspopup="true" aria-expanded="true">Markets</a>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
          	<li class="nfl_dv"><a href="#">BASKETBALL</a>
          	<ul class="nfl_dv_inner">
            <li class="nfl1_dv"><a href="#">NBA</a>
			   <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/NBA_Game_Props">NBA Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NBA_Team_Props">NBA Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NBA_Player_Props">NBA Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NBA_Future_Props">NBA Future Props</a></li>
			  </ul>
		    </li>
		     <li class="nfl1_dv"><a href="#">NCAAB</a>

			   <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAB_Game_Props">NCAAB Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAB_Team_Props">NCAAB Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAB_Player_Props">NCAAB Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAB_Future_Props">NCAAB Future Props</a></li>
			  </ul>
		    </li>
		    <li class="nfl1_dv"><a href="#">EUROLEAGUE</a>
			   <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROLEAGUE_Game_Props">EUROLEAGUE Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROLEAGUE_Team_Props">EUROLEAGUE Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROLEAGUE_Player_Props">EUROLEAGUE Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROLEAGUE_Future_Props">EUROLEAGUE Future Props</a></li>
			  </ul>
		    </li>
		    <li class="nfl1_dv"><a href="#">SPAIN</a>
			   <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_Game_Props">SPAIN Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_Team_Props">SPAIN Team Props</a></li>
			  </ul>
		    </li>

		      <li class="nfl1_dv"><a href="#">TURKEY</a>
			   <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/TURKEY_Game_Props">TURKEY Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/TURKEY_Team_Props">TURKEY Team Props</a></li>
			  </ul>
		    </li>
		</ul>
		</li>
		    <li class="nfl_dv"><a href="#">FOOTBALL</a>
          	<ul class="nfl_dv_inner">
            <li class="nfl1_dv"><a href="#">NFL</a> <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/NFL_Game_Props">NFL Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NFL_Team_Props">NFL Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NFL_Player_Props">NFL Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NFL_Future_Props">NFL Future Props</a></li>
			  </ul></li>

			  <li class="nfl1_dv"><a href="#">NCAAF</a> <ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAF_Game_Props">NCAAF Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAF_Team_Props">NCAAF Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAF_Player_Props">NCAAF Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/NCAAF_Future_Props">NCAAF Future Props</a></li>
			  </ul></li>
			</ul></li>
			<li class="nfl_dv"><a href="#">BASEBALL</a>
          	<ul class="nfl_dv_inner">
            <li class="nfl1_dv"><a href="#">MLB Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/MLB_Game_Props">MLB Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/MLB_Team_Props">MLB Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/MLB_Player_Props">MLB Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/MLB_Future_Props">MLB Future Props</a></li>
			  </ul></li>
			  <li class="nfl1_dv"><a href="#">JAPAN Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/JAPAN_Game_Props">JAPAN Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/JAPAN_Team_Props">JAPAN Team Props</a></li>
			  </ul></li>
			  <li class="nfl1_dv"><a href="#">MEXICO Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/MEXICO_Game_Props">MEXICO Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/MEXICO_Team_Props">MEXICO Team Props</a></li>
			  </ul></li>
			  <li class="nfl1_dv"><a href="#">CUBA Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/CUBA_Game_Props">CUBA Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/CUBA_Team_Props">CUBA Team Props</a></li>
			  </ul></li>
			  <li class="nfl1_dv"><a href="#">DOMINICANA Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/DOMINICANA_Game_Props">DOMINICANA Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/DOMINICANA_Team_Props">DOMINICANA Team Props</a></li>
			  </ul></li>
			  <li class="nfl1_dv"><a href="#">KOREA Baseball</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/KOREA_Game_Props">KOREA Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/KOREA_Team_Props">KOREA Team Props</a></li>
			  </ul></li>
			  </ul></li>
			  <li class="nfl_dv"><a href="#">SOCCER</a>
          	<ul class="nfl_dv_inner">
			   <li class="nfl1_dv"><a href="#">USA SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/SOCCER_Game_Props">USA Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SOCCER_Team_Props">USA Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SOCCER_Player_Props">USA Player Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SOCCER_Future_Props">USA Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">England SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/England_SOCCER_Game_Props">England Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/England_SOCCER_Team_Props">England Team Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/England_SOCCER_Player_Props">England Player Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/England_SOCCER_Future_Props">England Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">FRANCE SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/FRANCE_SOCCER_Game_Props">FRANCE Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/FRANCE_SOCCER_Team_Props">FRANCE Team Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/FRANCE_SOCCER_Player_Props">FRANCE Player Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/FRANCE_SOCCER_Future_Props">FRANCE Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">GERMANY SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/GERMANY_SOCCER_Game_Props">GERMANY Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/GERMANY_SOCCER_Team_Props">GERMANY Team Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/GERMANY_SOCCER_Player_Props">GERMANY Player Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/GERMANY_SOCCER_Future_Props">GERMANY Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">ITALY SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/ITALY_SOCCER_Game_Props">ITALY Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/ITALY_SOCCER_Team_Props">ITALY Team Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/ITALY_SOCCER_Player_Props">ITALY Player Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/ITALY_SOCCER_Future_Props">ITALY Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">SPAIN SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_SOCCER_Game_Props">SPAIN Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_SOCCER_Team_Props">SPAIN Team Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_SOCCER_Player_Props">SPAIN Player Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/SPAIN_SOCCER_Future_Props">SPAIN Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">EUROCUP SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROCUP_SOCCER_Game_Props">EUROCUP Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROCUP_SOCCER_Team_Props">EUROCUP Team Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/EUROCUP_SOCCER_Future_Props">EUROCUP Future Props</a></li>
			  </ul></li>
			   <li class="nfl1_dv"><a href="#">WORLDCUP SOCCER</a><ul class="nfl1_dv_inner">
			   <li><a href="<?php echo base_url(); ?>browse/propsMarket/WORLD_CUP_SOCCER_Game_Props">WORLDCUP Game Props</a></li>
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/WORLD_CUP_SOCCER_Team_Props">WORLDCUP Team Props</a></li>
			    <li><a href="<?php echo base_url(); ?>browse/propsMarket/WORLD_CUP_SOCCER_Future_Props">WORLDCUP Future Props</a></li>
			  </ul></li>
			  </ul></li>

			   <li class="nfl_dv"><a href="#">TENNIS ATP</a>
			   	<ul class="nfl_dv_inner">
			   <!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Game_Props">TENNIS Game Props</a></li> -->
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Team_Props">TENNIS Team Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Player_Props">TENNIS ATP Player Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Future_Props">TENNIS Future Props</a></li> -->
			  </ul>
			</li>
			<li class="nfl_dv"><a href="#">TENNIS WTA</a>
			   	<ul class="nfl_dv_inner">
			   <!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Game_Props">TENNIS Game Props</a></li> -->
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Team_Props">TENNIS Team Props</a></li> -->
				<li><a href="<?php echo base_url(); ?>browse/propsMarket/WTA_Player_Props">TENNIS WTA Player Props</a></li>
				<!-- <li><a href="<?php echo base_url(); ?>browse/propsMarket/TENNIS_Future_Props">TENNIS Future Props</a></li> -->
			  </ul>
			</li>
			  
            <li role="separator" class="divider"></li>
            <li><a href="<?php echo base_url(); ?>browse/featured">Other</a></li>
          </ul>
        </li>
        <li class="dropdown"> 
        <a href="<?php echo base_url(); ?>analysis" class="dropdown-toggle" type="button" aria-haspopup="true" aria-expanded="true">Blog</a>
       
        </li>
        <li class="dropdown" ><a href="<?php echo base_url(); ?>about">About</a>
		    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="<?php echo base_url(); ?>sports-swaps">What is SportsSwaps?</a></li>
				<li><a href="<?php echo base_url(); ?>how-it-works">How it works</a></li>
				<li><a href="<?php echo base_url(); ?>faq">FAQ</a></li>
				<li><a href="#">Contact US</a></li>
            </ul>
		</li>
		<?php $id = $this->session->userdata('id'); if($id == '') {  ?>
       	<li><a href="<?php echo base_url(); ?>login">Sign In</a></li> 
        <li class="login-a"><a href="<?php echo base_url(); ?>signup">Sign Up</a></li>                         
		<?php }else{ $username = $this->session->userdata('username'); ?>
		<li class="login-a dropdown"><a class="dropdown-toggle" type="button"  aria-haspopup="true" aria-expanded="true" href="#"><?php echo $username ; ?></a>
		    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
				<li><a href="<?php echo base_url(); ?>myshare"><i class="fa fa-share-square-o"></i> My Shares</a></li>
				<li><a href="<?php echo base_url(); ?>history"><i class="fa fa-history"></i> History</a></li>
				<li><a href="<?php echo base_url(); ?>funds"><i class="fa fa-usd"></i> Funds</a></li>
				<li><a href="<?php echo base_url(); ?>setting"><i class="fa fa-cog"></i> Settings</a></li>
				<li><a href="<?php echo base_url(); ?>logout"><i class="fa fa-sign-out"></i> Sign Out</a></li>
            </ul>
		</li>
		
		<li class="login-a"><a href="<?php echo base_url(); ?>logout">Sign Out</a></li>
		<?php } ?>                         
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!--menu-->






