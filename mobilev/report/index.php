<div class="pages">
  <div data-page="form" class="page no-toolbar no-navbar">
    <div class="page-content">

      <div class="navbarpages navbarpagesbg">
        <div class="navbar_left">
          <div class="logo_text"><a href="./index.php">LAPORAN</a></div>
        </div>
        <div class="navbar_right navbar_right_menu">
          <a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/menu.png" alt="" title="" /></a>
        </div>
      </div>

      <div id="pages_maincontent">

        <div class="page_single layout_fullwidth_padding">

          <div class="contactform">
            <form id="CustomForm" method="POST" action="report/report.php">

              <div class="form_row custom_select">
                <a href="#" class="item-link smart-select" data-open-in="picker">
                  <div class="item-content">
                    <div class="item-inner">
                      <label>PERIODE</label>
                    </div>
                  </div>
                  <select name="periode">
                    <option value="" disabled selected>Pilih Periode</option>
                    <option value="sensor0224|drdposting202402">FEBRUARI 2024</option>
                    <option value="sensor0124|drdposting202401">JANUARI 2024</option>
                    <option value="sensor1223|drdposting202321">DESEMBER 2023</option>
                    <option value="sensor1123|drdposting202311">NOVEMBER 2023</option>
                    <option value="sensor1023|drdposting202310">OKTOBER 2023</option>
                    <option value="sensor0923|drdposting202309">SEPTEMBER 2023</option>
                    <option value="sensor0823|drdposting202308">AGUSTUS 2023</option>
                  </select>
                </a>
              </div>

              <div class="form_row">
                <label>SENSOR:</label>
                <div class="form_row_right">
                  <label class="label-radio item-content">
                    <!-- Checked by default -->
                    <input type="radio" name="name" value="sensor_reservoar|zona hdpe" checked="checked">
                    <div class="item-inner">
                      <div class="item-title">RESERVOAR</div>
                    </div>
                  </label>

                  <label class="label-radio item-content">
                    <!-- Checked by default -->
                    <input type="radio" name="name" value="sensor_gesek|zona gesek">
                    <div class="item-inner">
                      <div class="item-title">IPA GESEK</div>
                    </div>
                  </label>

                  <label class="label-radio item-content">
                    <!-- Checked by default -->
                    <input type="radio" name="name" value="sensor_HDPE|zona hdpe">
                    <div class="item-inner">
                      <div class="item-title">IPA HDPE</div>
                    </div>
                  </label>

                  <label class="label-radio item-content">
                    <!-- Checked by default -->
                    <input type="radio" name="name" value="sensor_pcm|zona pcm">
                    <div class="item-inner">
                      <div class="item-title">IPA PCM</div>
                    </div>
                  </label>
                </div>
              </div>
              <input type="submit" name="submit" class="form_submit" id="submit" value="Lihat" />
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>