
<div class="modal modal-danger fade" id="pleaseAddStockIntoInventoryModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4><i class="icon fa fa-ban"></i>  No Stocks In Inventory Alert!</h4>
            </div>
            <div class="modal-body">
                <p style="font-size: 20px">Please <strong> A D D - S T O C K S </strong> to Inventory</p>
            </div>
            <div class="modal-footer">

                <a href="{{url('stocks/create')}}" style="text-decoration: none"><button class="btn btn-outline" id="submitbtn">Ok, Add new Stocks </button></a>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>