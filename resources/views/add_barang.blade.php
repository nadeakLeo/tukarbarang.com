@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Store</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="fileUpload" method="post" enctype="multipart/form-data">


                        <label for="item_name"> Nama Barang :</label>
                        <input type="text" name="item_name"><br/>


                        <label for="item_image"> Gambar Barang:</label>
                        <img src="" id="img" class="img" style="height: 160px; width: 160px; border: 2px solid darkslategray;">
                        <input type="file" name="item_image" id="item_image" style="display: none"><br/>
                        <input type="button" name="" value="Browse" id="browse_file" class="btn btn-primary form-control">

                        <label for="item_status"> Status Barang :</label>
                        <input type="radio" name="item_status" value="new"> Baru
                        <input type="radio" name="item_status" value="second"> Bekas<br>


                        <label for="item_category"> Kategori Barang :</label>
                        <select name ="item_category" id="item_category">
                            <option value="perkakas" selected="selected">Perkakas</option>
                            <option value="elektronik">Elektronik</option>
                            <option value="alat_tulis" >Alat Tulis</option>
                            <option value="3">test3</option>
                        </select><br>

                        <label for="item_weight"> Berat Barang : (gr)</label>
                        <input type="number" name="item_weight"><br/>

                        <label for="item_long"> Panjang Barang : (cm)</label>
                        <input type="number" name="item_long"><br/>

                        <label for="item_width"> Lebar Barang : (cm)</label>
                        <input type="number" name="item_width"><br/>

                        <label for="item_preffer"> Barang Tukar yang Diharapkan :</label>
                        <input type="text" name="item_preffer"><br/>


                        <input type="submit" name="submit" value="Submit">


                        {{csrf_field()}}
                    </form>


                </div>

            </div>
        </div>
    </div>
</div>
<script type="text/javascript">


    $(document).ready(function(){
        $('#item_image').on('change',function (e) {
            var fileInput=this;
            if (fileInput.files[0]) {
                var reader= new FileReader();
                reader.onload=function (e) {
                    $('#img').attr('src',e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        })
        $('#browse_file').on('click',function (e) {
            $('#item_image').click();
        })

    });
</script>
@endsection
