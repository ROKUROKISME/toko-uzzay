<!-- Modal Resi-->
<div class="modal fade" id="modalrating" tabindex="-1" aria-labelledby="modalResi" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Rating</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">

                    <input type="hidden" id="id_detailpenjualanselesai" name="id_detailpenjualanselesai">
                    <input type="hidden" id="id_barangselesai" name="id_barangselesai">

                    <div class="form-group">
                        <label for="komentar">Komentar</label>
                        <textarea name="komentar" id="komentar" class="form-control" cols="30" rows="5" placeholder="Masukan Pertanyaan"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="rating_bar">Rating</label>
                        <div class="txt-center">
                            <div class="rating">
                                <input id="star5" name="star" type="radio" value="5" class="radio-btn hide" />
                                <label for="star5">☆</label>
                                <input id="star4" name="star" type="radio" value="4" class="radio-btn hide" />
                                <label for="star4">☆</label>
                                <input id="star3" name="star" type="radio" value="3" class="radio-btn hide" />
                                <label for="star3">☆</label>
                                <input id="star2" name="star" type="radio" value="2" class="radio-btn hide" />
                                <label for="star2">☆</label>
                                <input id="star1" name="star" type="radio" value="1" class="radio-btn hide" />
                                <label for="star1">☆</label>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary exitModal" data-dismiss="modal">Batal</button>
                        <button type="submit" name="btnrating" class="btn btn-primary">Nilai</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    var content = '';
    for (var i = 1; i <= 5; i++)
        content += ' <span id="rate_' + i + '">✰</span> ';
    document.getElementById('rating_bar').innerHTML = content;

    var spans = document.getElementById("rating_bar")
        .getElementsByTagName('span');
    for (i = 0; i < spans.length; i++)
        spans[i].onmouseover = hoverStar;

    function hoverStar() {
        for (i = 0; i < this.id.charAt(5); i++)
            spans[i].innerText = '⭐';
        for (i = this.id.charAt(5); i < 5; i++)
            spans[i].innerText = '✰';
    }
</script>
<!-- end Resi -->