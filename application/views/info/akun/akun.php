<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img" style="width:270px;height:200px;">
                            <img src="<?php if($member->gambar != "") { echo base_url('assets/upload/member/thumbs/'.$member->gambar); } else { echo base_url('assets/upload/member/thumbs/64/guest.jpg'); } ?>" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                <?php if(($member->NIM) == '11319028') {?>
                                    🎯 Focusing
                            <?php } else{?>
                                --@--
                            <?php } ?>
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?= $member->nama ?>
                                    </h5>
                                    <?php if(($member->NIM) == '11319028') {?>
                                    <h6>Web Developer and Web Designer</h6>
                            <?php } ?>
                                    <!-- Test Status -->
                                    <?php if(($member->akses_level) == 'User') { $status = 'Member'; } ?>
                                    <p class="proile-rating">Status : <span><?= $status ?></span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Info Member</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link btn btn-primary" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <a href="<?php echo base_url('info/member/edit') ?>" class="btn btn-info btn-md">Edit Profile</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                    <?php if(($member->NIM) == '11319028') {?>
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            <a href="javascript:void(0)">Website Link</a><br/>
                            <a href="javascript:void(0)">Bootsnipp Profile</a><br/>
                            <a href="javascript:void(0)">Bootply Profile</a>
                            <p>SKILLS</p>
                            <a href="javascript:void(0)">Web Designer</a><br/>
                            <a href="javascript:void(0)">Web Developer</a><br/>
                            <a href="javascript:void(0)">WordPress</a><br/>
                            <a href="javascript:void(0)">WooCommerce</a><br/>
                            <a href="javascript:void(0)">PHP, .Net</a><br/>
                            <a href="javascript:void(0)">Data Scients</a><br/>
                            <a href="javascript:void(0)">c#,C,C++</a><br/>
                            <a href="javascript:void(0)">Python</a><br/>
                        </div>
                    <?php }else { ?>
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            --No Body--
                            <p>SKILLS</p>
                            --No Body--
                        </div>
                    <?php } ?>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>User Id</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $member->username ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $member->nama ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $member->email ?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIM</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $member->NIM ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>PRODI</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?= $member->Prodi ?></p>
                                            </div>
                                        </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Your Bio</label><br/>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?= $member->Motivasi ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>

        <style>
        body{
    background: -webkit-linear-gradient(left, #3931af, #00c6ff);
}
.emp-profile{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.profile-img{
    text-align: center;
}
.profile-img img{
    width: 70%;
    height: 100%;
}
.profile-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.profile-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.profile-head h5{
    color: #333;
}
.profile-head h6{
    color: #0062cc;
}
.profile-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.proile-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.proile-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.profile-head .nav-tabs{
    margin-bottom:5%;
}
.profile-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.profile-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.profile-work{
    padding: 14%;
    margin-top: -15%;
}
.profile-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.profile-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.profile-work ul{
    list-style: none;
}
.profile-tab label{
    font-weight: 600;
}
.profile-tab p{
    font-weight: 600;
    color: #0062cc;
}
        </style>


}
<style>
.emp-home{
    padding: 3%;
    margin-top: 3%;
    margin-bottom: 3%;
    border-radius: 0.5rem;
    background: #fff;
}
.home-img{
    text-align: center;
}
.home-img img{
    width: 70%;
    height: 100%;
}
.home-img .file {
    position: relative;
    overflow: hidden;
    margin-top: -20%;
    width: 70%;
    border: none;
    border-radius: 0;
    font-size: 15px;
    background: #212529b8;
}
.home-img .file input {
    position: absolute;
    opacity: 0;
    right: 0;
    top: 0;
}
.home-head h5{
    color: #333;
}
.home-head h6{
    color: #0062cc;
}
.home-edit-btn{
    border: none;
    border-radius: 1.5rem;
    width: 70%;
    padding: 2%;
    font-weight: 600;
    color: #6c757d;
    cursor: pointer;
}
.home-rating{
    font-size: 12px;
    color: #818182;
    margin-top: 5%;
}
.home-rating span{
    color: #495057;
    font-size: 15px;
    font-weight: 600;
}
.home-head .nav-tabs{
    margin-bottom:5%;
}
.home-head .nav-tabs .nav-link{
    font-weight:600;
    border: none;
}
.home-head .nav-tabs .nav-link.active{
    border: none;
    border-bottom:2px solid #0062cc;
}
.home-work{
    padding: 14%;
    margin-top: -15%;
}
.home-work p{
    font-size: 12px;
    color: #818182;
    font-weight: 600;
    margin-top: 10%;
}
.home-work a{
    text-decoration: none;
    color: #495057;
    font-weight: 600;
    font-size: 14px;
}
.home-work ul{
    list-style: none;
}
.home-tab label{
    font-weight: 600;
}
.home-tab p{
    font-weight: 600;
    color: #0062cc;
}
        </style>