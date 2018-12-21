<!-- The Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
<div class="modal-content">
  
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><i class="fa fa-print"></i> Print</h4>
        </div>

      <!-- Modal body -->
      <div class="modal-body">
        <div class="modal-text text-center">
                            <p>Print <b>laporan pengeluaran</b> melalui?</p>
                            <button type="submit" class="mb-xs mt-xs mr-xs btn btn-warning"></button>
                            <a href="{{ url('laporan_pengeluarans/exportExcel')}}" type="button" class="mb-xs mt-xs mr-xs btn btn-success">
                            <i class="fa fa-file-excel-o"></i>&nbspExcel</a>
                          </div>
      </div>

    </div>
  </div>
</div>