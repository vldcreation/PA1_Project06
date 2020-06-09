<!-- CSS Quotes Komentar -->
<style type='text/css'>
.comments h4 {
    font-size: 16px;
}
.comments h6 {
    font-size: 10px;
}
.comments .avatar-image-container {
    max-height: 50px;
    width: 50px;
}
.comments .avatar-image-container img {
    border-radius: 50px;
    border:3px solid #dadada;
    width: 40px;
    height: 40px;
    margin-right: 100px;
    max-width: 50px;
}
.comments .comment-block{
    border: 1px solid #dadada;
    background: #fdfdfd;
    padding: 10px;
    font-size: 14px;
    border-radius: 10px 0px 10px 0px;
    margin-left: 60px;
}
.comments .comment-block::after {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    left: -14px;
    top: 16px;
    border: 7px solid;
    border-color: transparent #fdfdfd transparent transparent;
}
.comments .comment-block::before {
    content: ' ';
    position: absolute;
    width: 0;
    height: 0;
    top: 15px;
    left: -16px;
    border: 8px solid;
    border-color: transparent #dadada transparent transparent;
}
.comments .comment-header,
.comments .comments-content .comment-thread,
.comments .continue a {
    font-size: 14px;
}
.comments .comment-header {
    background: #5BC0DE;
    padding: 5px;
    border-radius: 10px 0px 0px 0px;
}
.comments .comment-content {
    font-size: 14px;
}
.comments .comments-content .comment-content {
    margin-bottom: 10px;
}
.comments .comments-content .datetime{
    font-size: 12px;
    float:right;
    margin-right: 10px;
    padding-top: 5px;
}

.dt{
    font-size: 12px;
    float:right;
    margin-right: 10px;
    padding-top: 5px;
    color : #fff;
}

.dear{
    font-size: 16px;
    color : #fff;
    font-weight: bold;
    padding-right : 10px;
}

.comments .comments-content .user {
    font-style:normal;
    font-weight:bold;
    font-size: 16px;
}

.user{
    font-style: normal;
    font-weight: bold ;
    font-size: 16px;
    color: black;
}

.comments .comments-content .user a,
.comments .comments-content .datetime a {
    color: #fff;
}
.comments .comment .comment-actions a {
    margin-top: 30px;
    background: #37988e;
    color: #fff;
    padding: 5px;
    margin: 3px;
}

.hehe{
    margin-top: 30px;
    background: #5BC0DE;
    color: #fff;
    padding: 5px;
    margin: 3px;
}

.comments .continue a {
    display:inline;
    background: #37988e;
    color: #fff;
    padding: 5px;
    text-align: center;
    font-weight: normal;
}
.comments .continue a:hover {
    text-decoration: none;
    background: #277971;
}
.comments .comment .comment-actions a:hover{
    text-decoration: none;
    background: #277971;
}
</style>

<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Quotes of The Day</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="login-box">
  
  <!-- /.login-logo -->
  <div class="hold-transition login-page" >
  <div class="card">
    <div class="card-body login-card-body">
      <div class="login-logo" style="text-align:center;">
        <img src="<?php echo $this->website->icon(); ?>" alt="<?php echo $this->website->namaweb(); ?>" class="img img-responsive img-thumbnail" style="max-width: 30%; height: auto;">
        <br>
        <h2 style="font-weight: bold; font-size: 18px; margin-top: 20px;"><?php echo $this->website->namaweb() ?></h2>
      </div>

        <div class="form-group">
        <div class="comments">
                                            <div class="comments avatar-image-container">
                                            <?php if($this->session->userdata('pp') != "") {?>
                                                <img src="<?php echo base_url('assets/upload/user/thumbs/'.$this->session->userdata('pp'))?>" alt="">
                                            <?php } else{?>
                                                <img src="<?php echo base_url('assets/upload/user/thumbs/64/guest.jpg')?>" alt="">
                                            <?php } ?>
                                            </div>
                                            <div class="comments comment-block">
                                            <div class="comments comment-header">
                                            <a class="dear">Dear you</a><a class="user"> <?php if(($this->session->userdata('nama'))!== NULL) echo $this->session->userdata('nama'); else echo "@Guest"; ?></a>
                                            </div>
                                            <div class="comments comments-content">
                                                <?php $jlh = 1; foreach($quotes as $quotes) : if($jlh == 1) { ?>
                                                    <p>“<?= $quotes->body_quotes; ?>.”</p>
                                                <h6 class="dt"><a href="javascript:void(0)"><?php echo $quotes->footer_quotes;?></a></h6>
                                            
                                                <?php } $jlh++; endforeach; ?>
                                            </div>
                                            <div style="float:right; margin-top : 14px;">
                                                    <?php echo $quotes->author_quotes; ?>
                                            </div>
                                            </div>
                            </div>
        </div>

      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
</div>
<!-- /.login-box -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">Great,Thankyou</button>
      </div>
    </div>
  </div>
</div>