<div class="content-wrapper">
  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title"><?= $title_page; ?></h4>
          <?php if ($this->session->flashdata('msg_alert')) { ?>

            <div class="alert alert-info">
              <label style="font-size: 13px;"><?= $this->session->flashdata('msg_alert'); ?></label>
            </div>
          <?php } ?>
          <?= form_open_multipart('data_master/add_new/pegawai', array('method' => 'post')); ?>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-9">
                  <input type="text" name="nama" class="form-control" />
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                <div class="col-sm-9">
                  <select name="jenis_kelamin" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-9">
                  <input type="date" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Avatar</label>
                <div class="col-sm-9">
                  <input type="file" name="avatar">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Unit Kerja</label>
                <div class="col-sm-9">
                  <input type="text" name="unit_kerja" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">NIP</label>
                <div class="col-sm-9">
                  <input type="number" name="nip" class="form-control" />
                </div>
              </div>
            </div>

          </div>
          <div class="row">


          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Status Pegawai</label>
                <div class="col-sm-9">
                  <select name="status_pegawai" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <option value="Organik Pelindo">Organik Pelindo</option>
                    <option value="Organik PTP">Organik PTP</option>
                    <option value="TNO">TNO</option>
                    <option value="PKWT">PKWT</option>
                  </select>
                </div>
              </div>
            </div>

          </div>
          <div class="row">
            <!-- <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                <div class="col-sm-9">
                  <select name="id_jabatan" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <?php
                    foreach ($list_jabatan as $lj) {
                    ?>
                      <option value="<?= $lj->id_jabatan; ?>"><?= $lj->nama_jabatan; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div> -->

          </div>
          <div class="row">
            <!-- <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nama Bidang</label>
                <div class="col-sm-9">
                  <select name="id_bidang" class="form-control">
                    <option disabled selected>-- Pilih --</option>
                    <?php
                    foreach ($list_bidang as $lb) {
                    ?>
                      <option value="<?= $lb->id_bidang; ?>"><?= $lb->nama_bidang; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                </div>
              </div>
            </div> -->
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input type="password" name="password" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-9">
                  <input type="text" name="id_user" class="form-control" />
                </div>
              </div>
            </div>
          </div>
          <div class="row">

          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <button type="submit" class="btn btn-success mr-2">Submit</button>
                <button class="btn btn-light" type="reset">Reset</button>
              </div>
            </div>
          </div>
          <?= form_close(); ?>
        </div>
      </div>
    </div>
  </div>
</div>