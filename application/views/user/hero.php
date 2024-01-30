<div id="carouselExampleIndicators" class="carousel slide mt-3 mb-5" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <?php
        $mark = 1;
        foreach ($terlaris as $trls) : ?>
            <div class="carousel-item <?= $mark == 1 ? 'active' : ''; ?> ">
                <img class="d-block w-100" src="<?= base_url() ?>assets/img/produk/<?= $trls['gambar']; ?>" width="800" height="500" alt="First slide">
            </div>
        <?php
            $mark++;
        endforeach; ?>
    </div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>