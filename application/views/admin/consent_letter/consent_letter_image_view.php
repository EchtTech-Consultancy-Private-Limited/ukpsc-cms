<style>
    .gallery {
        margin: 5px;
        border: 1px solid #ccc;
        float: left;
        width: 180px;
    }

    .gallery:hover {
        border: 1px solid #777;
    }

    .gallery img {
        width: 100%;
        /* height: auto; */
    }

    .desc {
        padding: 15px;
        text-align: center;
    }
    .toZoom {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

.toZoom:hover {opacity: 0.7;}

.modal {
  display: none; /* Hidden by default */
  position: absolute; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Add Animation */
.modal-content {  
  animation-name: zoom;
  animation-duration: 0.6s;
}

@keyframes zoom {
  from {transform: scale(0.1)} 
  to {transform: scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 11%;
  right: 25%;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}


@media (max-width: 1399px) and (min-width: 1024px) {
  .modal-content {
    max-width:550px
  }
  }

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
<div class="content-wrapper">
    <section class="content">
    <div class="card position-static">
            <div class="card-header border-0 position-static">
                <div class="d-inline-block">
                    <h3 class="card-title">
                        <i class="fa fa-list"></i>
                        <?php if($_SESSION['admin_role_id']==5){?>

                        Registered College/School Image.&nbsp;(पंजीकृत कॉलेज / स्कूल |)
                        <?php }else{?>
                          School/Center/College Image.&nbsp;(स्कूल/केंद्र/कॉलेज की जानकारी)
                        <?php }?>
                    </h3>

                </div><br><br><br>
                <div class="row">
                    <?php foreach($images as $image): ?>
                        <div class="gallery">
                            <img class="toZoom" src="<?= base_url('uploads/consent_data/' . $image); ?>" width="200">
                                <!-- The Modal -->
                                <div class="idMyModal modal">
                                <span class="close">&times;</span>
                                <img class="modal-content">
                            </div>
                            <!-- <div class="desc">Description for <?= $image; ?></div> -->
                        </div>
                    <?php endforeach; ?>
                </div>
        </div>
    </section>
</div>
<script>
const modal = document.getElementsByClassName('idMyModal');
const img = document.getElementsByClassName('toZoom');
const modalImg = document.getElementsByClassName('modal-content');
for ( let i = 0; i < img.length; i++ ) {
  img[i].onclick = function () {
    modal[i].style.display = "block";
    modalImg[i].src = this.src;
  }
}

var span = document.getElementsByClassName("close");
for ( let i = 0; i < span.length; i++ ) {
  span[i].onclick = function() { 
    modal[i].style.display = "none";
  }
}
</script>