

<style>
.modal.and.carousel {
  position: absolute; /* Needed because the carousel overrides the position property */
}

/* SDL changes - use Font Awesome */
.carousel-control {
    top: 45%;
    width: 5%;
    background-image: none;
}

.carousel-control.left, .carousel-control.right {
    background-image: none;
}
.carousel-control.left {
    margin-left: 25px;
}
.carousel-control.right {
    margin-right: 25px;
}
.carousel.slide {
    box-shadow: none;
}

</style>

<div class="modal fade and carousel slide" id="lightbox">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-body">
          <ol class="carousel-indicators">
            <li data-target="#lightbox" data-slide-to="0" class="active"></li>
            <li data-target="#lightbox" data-slide-to="1"></li>
            <li data-target="#lightbox" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="http://placehold.it/900x500/777/" alt="First slide">
            </div>
            <div class="item">
              <img src="http://placehold.it/900x500/666/" alt="Second slide">
            </div>
            <div class="item">
              <img src="http://placehold.it/900x500/555/" alt="Third slide">
              <div class="carousel-caption"><p>even with captions...</p></div>
            </div>
          </div><!-- /.carousel-inner -->
          <a class="left carousel-control" href="#lightbox" role="button" data-slide="prev">
            <i class="fa fa-chevron-left fa-2x"></i>
          </a>
          <a class="right carousel-control" href="#lightbox" role="button" data-slide="next">
            <i class="fa fa-chevron-right fa-2x"></i>
          </a>
        </div><!-- /.modal-body -->
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->