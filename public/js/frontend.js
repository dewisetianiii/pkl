var url = '/api/artikel'
        $.ajax({
            url: url,
            dataType : 'json',
            success : function(berhasil) {
                $.each(berhasil.data, function(key, value){
                    $(".artikel-home").append(
                        `
                        <!-- Single Post -->
                        <div class="col-12 col-md-6">
                            <div class="single-blog-post style-3">
                                <div class="post-thumb">
                                    <a href="#"><img src="../assets/img/artikel/${value.foto}" alt=""></a>
                                </div>
                                <div class="post-data">
                                    <a href="#" class="post-catagory">${value.kategori.nama_kategori}</a>
                                    <a href="#" class="post-title">
                                        <h6>${value.judul}</h6>
                                    </a>
                                   
                                </div>
                            </div>
                        </div>
                        `
                    )
                })
            },
            error: function(gagal){
                console.log(gagal)
            }
        });

        var url = '/api/kategori'
        $.ajax({
            url: url,
            dataType : 'json',
            success : function(berhasil) {
                $.each(berhasil.data, function(key, value){
                    $(".kategori").append(
                        `
                        <div class="single-popular-post">
                            <a href="#">
                                <h6>${value.nama_kategori}</h6>
                                <hr>
                            </a>
                        </div>
                        `
                    )
                })
            },
            error: function(gagal){
                console.log(gagal)
            }
        });

        var url = '/api/tag'
        $.ajax({
            url: url,
            dataType : 'json',
            success : function(berhasil) {
                $.each(berhasil.data, function(key, value){
                    $(".tag").append(
                        `
                        <div class="single-popular-post">
                            <a href="#">
                                <h6>${value.nama_tag}</h6>
                                <hr>
                            </a>
                        </div>
                        `
                    )
                })
            },
            error: function(gagal){
                console.log(gagal)
            }
        });