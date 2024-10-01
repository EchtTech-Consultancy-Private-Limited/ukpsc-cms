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
        height: auto;
    }

    .desc {
        padding: 15px;
        text-align: center;
    }
</style>
<div class="row">
    <?php foreach($images as $image): ?>
        <div class="gallery">
            <a target="_blank" href="<?= base_url('uploads/' . $image); ?>">
                <img src="<?= base_url('uploads/consent_data/' . $image); ?>" alt="Image" />
            </a>
            <!-- <div class="desc">Description for <?= $image; ?></div> -->
        </div>
    <?php endforeach; ?>
</div>