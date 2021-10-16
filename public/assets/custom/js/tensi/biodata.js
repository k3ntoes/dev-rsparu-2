const Module = {
    setdata: (pasien, kunj) => {
        $('#nama').html(pasien.nama)
        $('#umur').html(`${kunj.umurthn} Th ${kunj.umurbln} Bl ${kunj.umurhr} Hr`)
        $('#alamat').html(`${pasien.kkelurahan} RT ${pasien.rtrw}, ${pasien.kkecamatan}`)
        $('#ttl').html(`${pasien.tmptlahir}, ${pasien.tgllahir}`)
        $('#jeniskel').html(pasien.jeniskel)
    },
    resetData: () => {
        $('#nama').html('NaN')
        $('#umur').html('NaN')
        $('#alamat').html('NaN')
        $('#ttl').html('NaN')
        $('#jeniskel').html('NaN')
    }
}

export { Module as biodata }