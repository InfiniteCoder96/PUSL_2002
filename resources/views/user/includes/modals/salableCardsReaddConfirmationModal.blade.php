
<div class="modal modal-primary fade" id="salableCardsReaddConfirmationModal" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4><i class="icon fa fa-ban"></i>  Saleable Cards Found !</h4>
            </div>
            <div class="modal-body">
                <h4><strong id="no_of_sellable_cards"></strong>&nbsp;&nbsp;&nbsp;saleable cards found as sales returns</h4>
                <br/>
                <p style="font-size: 20px">Do you want to <strong> add these saleable cards </strong> to Inventory ?</p>
            </div>
            <div class="modal-footer">
                <p style="font-size: 13px;" ><strong style="color: red">*</strong> If you press "No, I'll do it later" button you will have to
                    add these cards to the inventory manually</p>
                    <button type="button" class="btn btn-outline pull-left" onclick="cancel_re_stock_salable_cards()" data-dismiss="modal">No, I'll do it later</button>
                    <button class="btn btn-outline" id="submitbtn" type="button" onclick="re_stock_salable_cards()">Yes, add saleable items now</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
