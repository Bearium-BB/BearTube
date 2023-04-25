<head>
  <link href="https://vjs.zencdn.net/8.0.4/video-js.css" rel="stylesheet" />
  <link rel="stylesheet" href="/../php/BearTube/Style/Index.css">
  <link rel="stylesheet" href="/../php/BearTube/Style/Play.css">

</head>

<body>
  <?php include $_SERVER['DOCUMENT_ROOT'] . '/php/BearTube/Navbar.php'; ?>
    <div class = "VideoPayer">
        <video
            id="my-video"
            class="video-js"
            controls
            preload="auto"
            width="900"
            height="506.25"
            data-setup="{}"
        >
            <?php
                echo  '<source src="/../Videos/'.$_GET['id'].'/Video.'.$_GET['VideoType'].'" type="video/'.$_GET['VideoType'].'" />'
            ?>
            <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
                >supports HTML5 video</a
            >
            </p>
        </video>
  </div>
  <script src="https://vjs.zencdn.net/8.0.4/video.min.js"></script>
</body>


