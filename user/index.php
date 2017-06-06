<?php
    require '../view/top.php';
?>
 <link rel="stylesheet" type="text/css" href="/css/user.css?4">
 <style type="text/css">
 body{
  background-color: white;
 }
 .no_data{
  text-align: center;
 }
 .time{
  float: right;
 }
 .panel-title{
  width: 100%;
 }
 .panel-body{
  width: 100%;
 }
 </style>
</head>
<body>
<?php
    require '../view/header.php';
?>
<div id="main" class="main user " style="min-height: 841px;width: 980px;margin: 0 auto;padding: 20px 0;">
  <!-- Nav tabs -->
  <ul class="nav nav-pills nav-stacked list_title" role="tablist">
    <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">我发表的</a></li>
    <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">通知中心</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content list_content">
    <div role="tabpanel" class="tab-pane active" id="home">
      <h3>我发表的</h3>
      <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#tie" aria-controls="tie" role="tab" data-toggle="tab">帖子</a></li>
        <li role="presentation"><a href="#ping" aria-controls="ping" role="tab" data-toggle="tab">评论</a></li>
      </ul>
      <div class="tab-content article_content">
        <div role="tabpanel" class="tab-pane active" id="tie">
          <?php
              $user_article_status = 0;
              require '../serve/user/index.php';
          ?>
        </div>
        <div role="tabpanel" class="tab-pane" id="ping">
          <?php
              $user_article_status = 1;
              require '../serve/user/index.php';
          ?>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
      <h3>通知中心</h3>
        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
          <?php
              $user_article_status = 2;
              require '../serve/user/index.php';
          ?>
        </div>
    </div>
  </div>

</div>
<script type="text/javascript" src="https://unpkg.com/vue/dist/vue.js"></script>
<script type="text/javascript">
  new Vue({
    el: '#main',
    data: {
      active: 'active'
    },
    methods: {
      submit: function(event){
        event.preventDefault();
        if(this.check){
          $(event.target).parents('form')[0].submit();
        }
      }
    }
  })
</script>
<?php
    require '../view/footer.php';
?>