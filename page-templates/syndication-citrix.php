<?php
/**
 * Template Name: Citrix Syndication
 */

get_header(); ?>
<style>
  #idSVNav ul li{
    list-style: none;
  }
</style>
        <div class="subpage clear">
              <?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
    
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                
                <div class="wrapper">
                 <?php
                    // Do not edit below this line
                    // ---------------------------------------------------------------------------
                    $SVQuerystring = "svgroup=csa&";
                    foreach (($_GET) as $SVGetKey => $SVGetValue) {
                      $SVQuerystring = $SVQuerystring.$SVGetKey."=".$SVGetValue."&";
                    }
                    $SVURL = "http://citrix.sharedvue.net/Sharedvue/pull/";
                    $SVURL = $SVURL."?svhost=".$_SERVER["HTTP_HOST"];
                    
                    if (!empty($_SERVER["PHP_SELF"])) {
                      if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['PHP_SELF']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
                      else $SVURL = $SVURL . $_SERVER['PHP_SELF'];
                    }
                    else if (!empty($_SERVER['SCRIPT_NAME'])) {
                      if ((isset($_SERVER['REDIRECT_URL'])) && (strpos($_SERVER['REDIRECT_URL'], $_SERVER['SCRIPT_NAME']) === FALSE)) $SVURL = $SVURL . $_SERVER['REDIRECT_URL'];
                      else $SVURL = $SVURL . $_SERVER['SCRIPT_NAME'];
                    }
                    
                    if (strlen($SVQuerystring) > 0) {
                      $SVURL = $SVURL.urlencode("?".$SVQuerystring);
                    }
                    
                    if (function_exists('curl_init')) {
                      $SVCurl = curl_init();
                      curl_setopt($SVCurl, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($SVCurl, CURLOPT_URL, $SVURL);
                      $SVContent = curl_exec($SVCurl);
                      $SVHTTPStatusCode = curl_getinfo($SVCurl, CURLINFO_HTTP_CODE);
                      curl_close($SVCurl);
                    }
                    else {
                    	$SVContent = file_get_contents($SVURL);
                    	list($SVHTTPVersion,$SVHTTPStatusCode,$SVHTTPMsg) = explode(' ',$http_response_header[0], 3);
                    }
                    
                    switch($SVHTTPStatusCode) {
                      case 200:
                        echo ($SVContent);
                        break;
                      default:
                        echo "<!-- SharedVue Output: Could not reach SharedVue server: $SVHTTPMsg ($SVHTTPStatusCode) -->";
                        break;
                    }
                    // ---------------------------------------------------------------------------
                    ?>                </div><!-- .entry-content -->
            </div><!-- #post-## -->
        
        <?php endwhile; ?>
        </div>

<?php get_footer(); ?>

						