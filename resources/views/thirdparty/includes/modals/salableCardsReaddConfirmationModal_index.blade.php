
<div class="modal modal-primary fade" id="salableCardsReaddConfirmationModal_index" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 id="modal_title"></h4>
            </div>
            <form action="{{action('StockController@salable_cards_restock_single', 'test')}}" method="post">
            <div class="modal-body">

                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Employee</th>
                        <th>Vendor</th>
                        <th>Product</th>
                        <th>Cards</th>
                    </tr>
                    </thead>
                    <tbody style="color: #0a0a0a">
                        <tr>
                            <td id="employee"></td>
                            <td id="vendor"></td>
                            <td id="product"></td>
                            <td style="width: 25%">
                                <input type="number" id="cards" name="cards" class="form-control" min="0">
                            </td>
                        </tr>
                    </tbody>

                </table>
                <p style="font-size: 20px">Do you want to <strong> continue ?</strong></p>
            </div>
            <div class="modal-footer">

                    {{csrf_field()}}

                    <input name="sale_id" id="sale_id" type="hidden">
                    <input name="product_id" id="product_id" type="hidden">
                    <input name="card_quantity" id="card_quantity" type="hidden">

                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No, Go back</button>
                    <button class="btn btn-outline" id="submitbtn">Yes, I'm Sure</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>