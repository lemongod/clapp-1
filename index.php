<?php
require_once('AppInfo.php');
require_once('utils.php');
/*
$facebook = new Facebook(array(
  'appId'  => AppInfo::appID(),
  'secret' => AppInfo::appSecret(),
  'sharedSession' => true,
  'trustForwarded' => true,
));
$user_id = $facebook->getUser();
  $likes = idx($facebook->api('/me/likes'), 'data', array());
  $friends = idx($facebook->api('/me/friends'), 'data', array());
  */
  ?>

<!DOCTYPE html>
<html>
<head>
  <title>
    Clapp
  </title>
  <link rel="stylesheet" href="stylesheets/styles.css" type="text/css">
  <link rel="stylesheet" href="stylesheets/fonts.css" type="text/css">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>

</head>
<body>

<div id="fb-root"></div>
<script>
  // Additional JS functions here
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'APPID', // App ID
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to accdess the session
      xfbml      : true  // parse XFBML
    });

    // Additional init code here

  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
  <div id="wrapper">
    <header>
      <div id="logo">
        <h1>clapp</h1>
      </div>
      <div id="nav">
        <a href="#classes">classes</a>
        <a href"#friends">friends</a>
        <a href="#about">about</a>
        <a href="#other">other</a>
      </div>
    </header>
    <h1>
      hello
    </h1>


    <div class="list">
        <h3>A few of your friends</h3>
        <ul class="friends">
          <?php
            foreach ($friends as $friend) {
              // Extract the pieces of info we need from the requests above
              $id = idx($friend, 'id');
              $name = idx($friend, 'name');
          ?>
          <li>
            <a href="https://www.facebook.com/<?php echo he($id); ?>" target="_top">
              <img src="https://graph.facebook.com/<?php echo he($id) ?>/picture?type=square" alt="<?php echo he($name); ?>">
              <?php echo he($name); ?>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>

       <div class="list">
        <h3>Things you like</h3>
        <ul class="things">
          <?php
            foreach ($likes as $like) {
              // Extract the pieces of info we need from the requests above
              $id = idx($like, 'id');
              $item = idx($like, 'name');

              // This display's the object that the user liked as a link to
              // that object's page.
          ?>
          <li>
            <a href="https://www.facebook.com/<?php echo he($id); ?>" target="_top">
              <img src="https://graph.facebook.com/<?php echo he($id) ?>/picture?type=square" alt="<?php echo he($item); ?>">
              <?php echo he($item); ?>
            </a>
          </li>
          <?php
            }
          ?>
        </ul>
      </div>
    </div>
</body>
</html>
