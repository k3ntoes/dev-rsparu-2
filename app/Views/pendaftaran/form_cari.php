<div class="card-content">
    <button id="daftarTunggu" class="btn btn-xs btn-primary btn-block">Daftar Tunggu Pasien</button>
</div>
<div class="card-content">
    <form method="post" action="#" class="row form-horizontal" id="frm_cari" style="margin-right: -5px; margin-left: -5px;" return="false">
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="fnama" placeholder="Nama Pasien" class="form-control">
                    <div class="input-group-addon btn btn-cari" id="srcNama">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="fdesa" placeholder="Desa" class="form-control">
                    <div class="input-group-addon btn btn-cari" id="srcDesa">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="fkecamatan" placeholder="Kecamatan" class="form-control">
                    <div class="input-group-addon btn btn-cari" id="srcKecamatan">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="fkabupaten" placeholder="Kabupaten" class="form-control">
                    <div class="input-group-addon btn btn-cari" id="srcKabupaten">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <div class="input-group input-group-sm">
                    <input type="text" id="frmlama" placeholder="No RM Lama" class="form-control">
                    <div class="input-group-addon btn btn-cari" id="srcNorm">
                        <span class="glyphicon glyphicon-search"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4" id="src_data_pas" style="display: none;">
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
    <table id="listPasien" class="table table-bordered table-hover dataTable" style="width:100%">
        <thead>
            <tr>
                <th>aksi</th>
                <th>Norm</th>
                <th>Norm Lama</th>
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