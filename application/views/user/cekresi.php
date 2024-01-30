<!-- SECTION -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg col-md col-xs">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Deskirpsi</th>
                                <th scope="col">Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /SECTION -->

<script>
    function cekresi() {

        const kurir = '<?= $this->uri->segment(3) ?>';
        const resi = '<?= $this->uri->segment(4) ?>';

        console.log(kurir);
        console.log(resi);

        $.ajax({
            type: "GET",
            url: "https://api.datamuse.com/words?ml=ringing+in+the+ears",
            // https://api.binderbyte.com/v1/track?api_key=25d82d807fb314afffeee5df37f2184f8e52be780536ef5fdf2c402a97a16dd8&courier=jnt&awb=JP6961181926
            data: {},
            success: function(response) {
                for (let i = 0; i < response.length; i++) {
                    console.log(response[i]);
                }


            },
        });
    }


    cekresi();
</script>