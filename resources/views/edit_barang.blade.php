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

                    <form action="editfileUpload" method="post" enctype="multipart/form-data">


                        <label for="item_name"> Nama Barang :</label>
                        <input type="text" name="item_name" class="form-control" value="{{$barang_detail->nama_barang}}">
                        <br>
                        <label for="item_image"> Barang:</label><br>
                        <img src="{{asset('img/barang_tukar/'.$barang_detail->path_gambar)}}" id="img" class="img" style="height: 160px; width: 160px; border: 2px solid darkslategray;">
                        <input type="file" name="item_image" id="item_image" style="display: none" class="form-control"><br>
                        <input type="button" name="" value="Browse" id="browse_file" class="btn form-control" style="width: 10%; margin-top: 10px;"><br><br>

                        <label for="item_status"> Status Barang :</label><br>
                        <input type="radio" name="item_status" value="new" 
                            @if($barang_detail->kondisi == 'new')
                                checked
                            @endif> Baru<br>
                        <input type="radio" name="item_status" value="second"
                            @if($barang_detail->kondisi == 'second')
                                checked
                            @endif> Bekas<br>
                        <br>

                        <label for="item_category"> Kategori Barang :</label>
                        <select name ="item_category" id="item_category" class="form-control">
                            <option value="perkakas" @if($barang_detail->kategori == 'perkakas')
                                selected @endif>Perkakas</option>
                            <option value="elektronik" @if($barang_detail->kategori == 'elektronik')
                                selected @endif>Elektronik</option>
                            <option value="alat_tulis" @if($barang_detail->kategori == 'alat_tulis')
                                selected @endif>Alat Tulis</option>
                        </select><br>

                        <div class="row">
                            <div class="col-sm-6">
                                <label for="item_weight"> Berat Barang : (gr)</label>
                                <input type="number" name="item_weight" class="form-control" value="{{$barang_detail->berat}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="item_long"> Panjang Barang : (cm)</label>
                                <input type="number" name="item_long" class="form-control" value="{{$barang_detail->panjang}}">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label for="item_width"> Lebar Barang : (cm)</label>
                                <input type="number" name="item_width" class="form-control" value="{{$barang_detail->lebar}}">
                            </div>
                            <div class="col-sm-6">
                                <label for="item_preffer"> Barang Tukar yang Diharapkan :</label>
                                <input type="text" name="item_preffer" class="form-control" value="{{$barang_detail->harapan_tukar}}">
                            </div>
                        </div>
                        <input type="hidden" name="id" value="{{$barang_detail->id}}">
                        <input type="hidden" name="path" value="{{$barang_detail->path_gambar}}">
                        <input type="submit" name="submit" value="Edit" class="btn btn-primary" style="margin-top: 10px;">


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
