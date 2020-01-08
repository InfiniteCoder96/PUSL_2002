
<div class="modal modal-primary fade" id="NonsalableCardsMoveToSaleableConfirmationModal_index" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 id="modal_title"></h4>
            </div>
            <form action="{{action('SalesController@move_to_saleable', 'test')}}" method="post" id="NonsalableCardsMoveToSaleableConfirmationForm">
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
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="number" id="non_saleable_cards" name="cards" class="form-control" min="0" onchange="nonsaleablecardsChanged(this)" onkeyup="nonsaleablecardsChanged(this)">
                                    </div>
                                    <span class="help-block hide">Help block with error</span>
                                </div>

                            </td>
                        </tr>
                    </tbody>

                </table>
                <p style="font-size: 20px">Do you want to <strong> continue ?</strong></p>
            </div>
            <div class="modal-footer">

                    {{csrf_field()}}

                <input id="non_saleable_form_status" type="hidden" value="true">

                <input name="sale_id" id="sale_id" type="hidden">
                <input name="product_id" id="product_id" type="hidden">
                <input name="card_quantity" id="non_saleable_cards_quantity" type="hidden">

                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">No, Go back</button>
                <button class="btn btn-outline" id="non_saleable_submit_btn" type="button">Yes, I'm Sure</button>

            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>