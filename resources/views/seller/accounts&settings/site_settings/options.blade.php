<div class="tab-pane fade" id="custom-tabs-one-Payment-tabhhref" role="tabpanel" aria-labelledby="custom-tabs-one-Payment-tab" style="padding-left: 20px;">
                              <h3 class="devider ColTextHighlight" style="color: #007bff ;"><i class="fa fa-gear fa-15x "></i>&nbsp;&nbsp;Options:</h3>
                              <hr>
                              <div class="block" style="padding:20px 0;">
                                 <span class="editLabel">Can the buyer purchase tickets to multiple events in one invoice?</span><br>
                                 <select name="ctl00$CPMain$cCompanyEdit$cPurchaseEventsTogether" id="ctl00_CPMain_cCompanyEdit_cPurchaseEventsTogether"><br>
                                    <option selected="selected" value="0">Yes</option>
                                    <option value="1">Only allow if events have the same organizer</option>
                                    <option value="2">Don't allow - This option won't allow any package or season ticket sale</option>

                                 </select>

                              </div>
                              <div class="block">
                                 <span id="ctl00_CPMain_cCompanyEdit_Label5" class="editLabel">Cash Discount:</span><br>
                                 <input name="ctl00$CPMain$cCompanyEdit$cCashDiscount" type="text" value="0.00" maxlength="5" id="ctl00_CPMain_cCompanyEdit_cCashDiscount" class="editText" data-validation-number="Float" data-validation-number-min="0" data-validation-number-max="100" data-validation-avoid-success-tick="1" style="width:50px;">
                                 <span>%</span>
                                 <p class="hint clear" style="font-size:14px;">Note: Cash sales is only available to sales agents.</p>
                              </div>



                              <div class="block">
                                 <span id="ctl00_CPMain_cCompanyEdit_Label9" class="editLabel">Phone numbers to collect:</span><br>
                                 <select name="ctl00$CPMain$cCompanyEdit$cNumberOfPhoneNumbers" id="ctl00_CPMain_cCompanyEdit_cNumberOfPhoneNumbers" class="editText" style="width:250px;">
                                    <option value="0">Don't ask for phone numbers</option>
                                    <option selected="selected" value="1">Ask for 1 phone number</option>
                                    <option value="2">Ask for phone &amp; cellphone number</option>

                                 </select>
                              </div><br>
                              <div class="block">
                                 <span id="ctl00_CPMain_cCompanyEdit_Label16" class="editLabel">Terms and policies last updated on:</span><br>
                                 <input name="ctl00$CPMain$cCompanyEdit$cTOSDate" type="text" value="01-01-2000" id="ctl00_CPMain_cCompanyEdit_cTOSDate" class="editText cDatePicker cDateView hasDatepicker" data-validation-required="1" style="width:250px;">
                                 <p class="hint clear" style="font-size:14px;">If updated, users will be asked to consent to the new terms.</p>
                              </div>
                              <div class="row">
                                 <div class="col-sm-6">
                                    <!-- checkbox -->
                                    <div class="form-group">
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox">
                                          <label class="form-check-label">Use opt-in (as opposed to opt-out) method for newsletter subscription</label>
                                       </div>
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox" checked>
                                          <label class="form-check-label">Show cookie policy and terms of use consent pop up when the user views the site</label>
                                       </div>
                                       <div class="form-check">
                                          <input class="form-check-input" type="checkbox">
                                          <label class="form-check-label">Two factor authentication for users with special permission</label>
                                       </div>
                                    </div>
                                 </div>


                                 <br>
                                 <br>
                                 <div>
                                    <h3 class="devider ColTextHighlight" style="color: #007bff ;">&nbsp;&nbsp;Questions to be asked:
                                       <hr>
                                       <div class="cHelp"><a class="showHint  ColTextHighlight" href="" target="_blank" title="Instruction for asking additional questions during the purchase" data-title="Instruction for asking additional questions during the purchase"></a></div>
                                    </h3>
                                    <p>Asking unnecessary questions during purchase may cause the buyer to abandon the sales and may result in business loss. Only ask questions if really necessary.</p>
                                    <br>

                                    <p style="text-align:right; margin-bottom:30px;"><a href="" target="_blank">Create and manage questions (new window)</a></p>
                                    <h3>Questions to be asked on the checkout page:</h3>
                                    <p class="hint">For example: How did you hear about our company?</p>
                                 </div>
                                 <div class="cMultiQuestionPicker">
                                    <input name="ctl00$CPMain$cCompanyEdit$QuestionPickerCheckout$cQuestionIds" type="text" id="ctl00_CPMain_cCompanyEdit_QuestionPickerCheckout_cQuestionIds" class="cQuestionIds" style="display:none;">
                                    <ol id="ctl00_CPMain_cCompanyEdit_QuestionPickerCheckout_cSelectedQuestions" class="selectedQuestions"></ol>
                                    <input type="text" class="editText cQuestionAutoComplete ui-autocomplete-input" style="width:450px;" autocomplete="off">
                                    <a href="javascript:void(0)" class="cAddQuestion"><i class="fa fa-arrow-circle-right fa-hover "></i>&nbsp;Add the question</a>
                                    <p class="hint" style="margin-top:10px;">Enter a few letters of the question that you have already created in the question manager, to select it. then click on <i>Add the question</i> button.</p>
                                 </div>
                                 <br>

                                 <br>
                                 <br>
                                 <h3 class="devider ColTextHighlight" style="color: #007bff ;"><i class="fa fa-star fa-15x " style="color: #007bff ;"></i>&nbsp;&nbsp;Pre-checkout items:</h3>
                                 <hr>

                                 <h3>Items to be shown on the pre-checkout page for all purchases:
                                    <div class="cHelp"><a class="showHint  ColTextHighlight" href="" target="_blank" title="Suggesting (promoting) related or featured events, merchandise or donation options in the checkout flow, on the pre-checkout page" data-title="Suggesting (promoting) related or featured events, merchandise or donation options in the checkout flow, on the pre-checkout page"></a></div>
                                 </h3>
                                 <br>

                                 <input type="hidden" name="ctl00$CPMain$cCompanyEdit$cPrecheckoutSettings$cSelectedProducts" id="ctl00_CPMain_cCompanyEdit_cPrecheckoutSettings_cSelectedProducts">
                                 <input type="hidden" name="ctl00$CPMain$cCompanyEdit$cPrecheckoutSettings$cSelectedDonations" id="ctl00_CPMain_cCompanyEdit_cPrecheckoutSettings_cSelectedDonations">
                                 <input type="hidden" name="ctl00$CPMain$cCompanyEdit$cPrecheckoutSettings$cSelectedEvents" id="ctl00_CPMain_cCompanyEdit_cPrecheckoutSettings_cSelectedEvents">
                                 <div class="cPreCheckoutSettingsModule">
                                    <input type="hidden" name="ctl00$CPMain$cCompanyEdit$cPrecheckoutSettings$cPrecheckoutSelectedValue" id="ctl00_CPMain_cCompanyEdit_cPrecheckoutSettings_cPrecheckoutSelectedValue" value="//">
                                    <div id="cPrecheckoutSettings">
                                       <div class="row">
                                          <p class="hint">Pre-checkout page is a promotional page that you can use to promote featured / related items (events, merchandise or donation options) prior to checkout. The items to be promoted can be selected globally, which affects all purchases, or/and can be selected per event, such as similar or relevant items, so they will only show up if the buyer is purchasing that specific event.
                                          </p>
                                          <p class="hint">If any item is selected to be shown on the pre-checkout page, the buyers will be taken to the pre-checkout page prior the checkout, where they can see related events, merchandise or donation options which they can add to their shopping cart prior to checkout.</p>
                                       </div>
                                       <div class="cPrecheckoutSettingsOn">
                                          <div class="row">
                                             <h4>Donation options to be shown:</h4>
                                             <p class="hint">You should have one or more donation pages to add donations on the pre-checkout page. You can add donations from <i>Control Panel &gt; Account &amp; Settings &gt; Pages &amp; Navigations</i></p>
                                          </div>
                                          <div class="row">
                                             <ul id="cSelectedDonations">

                                             </ul>
                                             <i class="fa  fa-plus"></i>&nbsp;&nbsp;<a href="javascript:void(0)" class="cPicker" data-datatype="donations" data-selecttype="multi" data-callbackfunction="PrecheckoutDonationsSelected">Select Donations</a>
                                          </div>
                                          <div class="row">
                                             <h4>Events to be shown:</h4>
                                          </div>
                                          <div class="row">
                                             <ul id="cSelectedEvents">

                                             </ul>
                                             <i class="fa  fa-plus"></i>&nbsp;&nbsp;<a href="javascript:void(0)" class="cPicker" data-datatype="upcomingeventsnoinstances" data-selecttype="multi" data-callbackfunction="PrecheckoutEventsSelected">Select Events</a>
                                          </div>
                                          <div class="row">
                                             <h4>Merchandise to be shown:</h4>
                                          </div>
                                          <div class="row">
                                             <ul id="cSelectedProducts">

                                             </ul>
                                             <i class="fa  fa-plus"></i>&nbsp;&nbsp;<a href="javascript:void(0)" class="cPicker" data-datatype="activeproducts" data-selecttype="multi" data-callbackfunction="PrecheckoutProductsSelected">Select Merchandise</a>
                                          </div>
                                       </div>
                                       <br>
                                       <br>
                                       <div class="row2" style="text-align:center;">
                                          <button class="btn btn-success  btn-sm" style="width: 60px;">Save</button>
                                       </div>

                                    </div>
                                 </div>


                                 <br>



                              </div>
                           </div>