<?php
    require './view/top.php';
?>
<script type="text/javascript" src="/js/wangEditor.min.js"></script>
<script type="text/javascript" src="/js/jquery-1.10.2.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/wangEditor.min.css">
<link rel="stylesheet" type="text/css" href="/css/content.css?4">
</head>
<body>
<?php
    require './view/header.php';
    require './serve/issue.php';
?>

<div class="main" style="min-height: 841px;width: 920px;margin: 0 auto;">
  <?php
      require './serve/content.php';
  ?>
  
  <div class="username"><?php echo $_COOKIE['user_name']?></div>
  <form class="form_publish" method="post" action="./serve/comment.php">
      <div id="content">
      </div>
      <input type="submit" value="回复" class="publish">
      <?php
        // 如果是本人发的帖子 可以关闭
        $name_1 = $_COOKIE['user_name'];
        $name_2 = $row[0]['name'];
        if($name_1 == $name_2){
          echo '<input type="button" value="关闭问题" class="close_issue">';
        }
      ?>
      <input type="hidden" name="article_id" class="article_id" value="<?php echo $row[0]['id']?>">
      <input type="hidden" name="article_user_name" value="<?php echo $row[0]['name']?>">
      <input type="hidden" name="content" value="" class="hidden_text">
      <input type="hidden" name="article_title" value="<?php echo $row[0]['title']?>">
      <input type="hidden" value="<?php echo $row[0]['status']?>" class="status">
    </form>
</div>

<script type="text/javascript">
    $(function () {
        var editor = new wangEditor('content');
        editor.create();
        $('.publish').on('click',function(){
          var html = editor.$txt.html();
          $('.hidden_text').val(html);
        })
    });
    $('.close_issue').on('click',function(){
      var id = $(".article_id").val();
      $.ajax({
        url: "/serve/closeIssue.php",
        type: 'post',
        data: {
          id: id,
          status: 1
        },
        success: function(data){
          var date = JSON.parse(data);
          if(date.code == 1){
            $('.close_issue').hide();
            $('.publish').val('问题已关闭').css('disabled','disabled');
            alert('关闭了');
          }
        }
      });
    })
    var status = $('.status').val();
    if(status == 1){
      $('.close_issue').hide();
      $('.publish').val('问题已关闭').attr('disabled','disabled');
    }
</script>
<?php
    require './view/footer.php';
?>