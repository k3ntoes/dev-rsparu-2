<div class="form-group">
    <label for="nourut" class="col-sm-3 col-form-label">No. Urut</label>
    <div class="col-sm-2">
        <input type="text" name="nourut" class="form-control input-sm" id="nourut" placeholder="Urut">
        <input type="hidden" name="uuid" id="uuid">
    </div>
    <div class="col-sm-3">
        <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
            <span class="btn btn-success glyphicon glyphicon-refresh" id="ulangBtn" data-toggle="tooltip" data-placement="top" title="Panggil Ulang"></span>
            <span class="btn btn-info glyphicon glyphicon-volume-up" id="panggilBtn" data-toggle="modal" data-placement="top" title="Panggil" data-target="#antrianModal"></span>
            <span class="btn btn-danger glyphicon glyphicon-fast-forward" id="lewatiBtn" data-toggle="tooltip" data-placement="top" onclick="lewati();" title="Lewati"></span>
        </div>
    </div>
    <label for="loket" class="col-sm-1 col-form-label text-right">Loket</label>
    <div class="col-sm-3">
        <select name="loket" id="loket" class="form-control input-sm">
            <option value="1">Loket 1</option>
            <option value="2">Loket 2</option>
            <option value="3">Loket 3</option>
        </select>
    </div>
</div>