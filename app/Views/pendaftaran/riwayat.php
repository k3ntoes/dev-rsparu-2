<div class="card-content">
    <form method="post" action="#" class="row form-horizontal" id="frm_cari_riwayat" style="margin-right: -5px; margin-left: -5px;">
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frnama" placeholder="Nama Pasien" class="form-control">
                    <div class="input-group-addon btn btn-r-cari">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frdesa" placeholder="Desa" class="form-control">
                    <div class="input-group-addon btn btn-r-cari">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frkecamatan" placeholder="Kecamatan" class="form-control">
                    <div class="input-group-addon btn btn-r-cari">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frkabupaten" placeholder="Kabupaten" class="form-control">
                    <div class="input-group-addon btn btn-r-cari">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frnorm" placeholder="No RM" class="form-control">
                    <div class="input-group-addon btn btn-r-cari">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="src_data_riwayat" style="display: none;">
            <div class="input-group">
                <input type="text" value="Sedang Mencari..." readonly="" class="form-control" style="background: red; color: white;">
                <div class="input-group-addon" style="background: red; color: white;">
                    <span class="fa fa-spinner fa-pulse fa-1x"></span>
                </div>
            </div>

        </div>
    </form>
</div>

<div class="card-content">
    <table id="listRiwayatKunj" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
            <tr>
                <!--<th>aksi</th>-->
                <th>Norm</th>
                <th>Tgl Kunj</th>
                <th>Nama</th>
                <th>JKel</th>
                <th>Desa</th>
                <th>Kecamatan</th>
                <th>Kabupaten</th>
                <th>NIK</th>
                <th>No Asuransi</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>