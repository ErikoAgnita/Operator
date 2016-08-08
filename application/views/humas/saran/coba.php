<script src="<?php echo base_url();?>assets/js/multiselect.js"></script>

<div class="page animsition" style="animation-duration: 800ms; opacity: 1;">
  <div class="page-content">
    <!-- Panel X-Editable -->
    <div class="panel">
      <header class="panel-heading">
        <h3 class="panel-title">Detail Saran</h3>
      </header>
      <div class="panel-body">
        <div class="table-responsive">
          <div class="row">
              <div class="col-xs-5">
                  <select name="from[]" id="multiselect" class="form-control" size="8" multiple="multiple">
                      <option value="1">Item 1</option>
                      <option value="2">Item 5</option>
                      <option value="2">Item 2</option>
                      <option value="2">Item 4</option>
                      <option value="3">Item 3</option>
                  </select>
              </div>
              
              <div class="col-xs-2">
                  <button type="button" id="multiselect_rightAll" class="btn btn-block"><i class="icon wb-user"></i></button>
                  <button type="button" id="multiselect_rightSelected" class="btn btn-block"><i class="icon wb-user"></i></button>
                  <button type="button" id="multiselect_leftSelected" class="btn btn-block"><i class="icon wb-user"></i></button>
                  <button type="button" id="multiselect_leftAll" class="btn btn-block"><i class="icon wb-user"></i></button>
              </div>
              
              <div class="col-xs-5">
                  <select name="to[]" id="multiselect_to" class="form-control" size="8" multiple="multiple"></select>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
jQuery(document).ready(function($) {
    $('#multiselect').multiselect();
});
</script>