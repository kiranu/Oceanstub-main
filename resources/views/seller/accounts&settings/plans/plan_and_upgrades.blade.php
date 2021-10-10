<div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab" style="padding-left: 30px;">
    <br />
    <h3 class="devider ColTextHighlight" style="color: #007bff;" ;><i class="fa fa-info-circle fa-15x"></i>&nbsp;&nbsp;Current Plan</h3>
    <hr />
    <div class="block" style="padding-left: 0px;">
        <p><span class="ColTextHighlight" style="color: #007bff;">Plan: </span> Standard</p>
        <br />
        <p><span class="ColTextHighlight" style="color: #007bff;">Monthly fee: </span> ₹0.00</p>
        <br />
        <p><span class="ColTextHighlight" style="color: #007bff;">Transaction fee: </span> 2.90% + ₹10.00</p>
        <br />
        <p><span class="ColTextHighlight" style="color: #007bff;">Billing day of the month: </span> 2</p>
    </div>
    <br />
    <div class="row" style="float: right!important;">
        <a style="margin-right: 167px;" class="ColTextHighlight cChangePlan" onclick="ChangePlan();">Change The Plan</a>

    </div>
    <span class="cNewPlan" id="planChangeDiv" style="display: none;">
        <h3 class="devider ColTextHighlight" style="color: #007bff;">Change Plan</h3>
        <hr />
        <br />
        <div class="row">
            <a href="" target="_blank"><i class="fa fa-balance-scale"></i>&nbsp;&nbsp;Compare Plans</a>
            <a href="javascript:void(0);" class="helpMeChooseBtn"><i class="fa fa-question-circle" style="padding-left: 650px;"></i>&nbsp;&nbsp;Help Me Choose The Plan</a>
        </div>
        <br />
        <br />
        <div class="row1">
            <span id="ctl00_CPMain_cAccountSettings_Label8" class="editLabel">New Plan:</span><br />
            <input type="hidden" name="ctl00$CPMain$cAccountSettings$cInitPlan" id="ctl00_CPMain_cAccountSettings_cInitPlan" value="BasicFree" />
            <select name="ctl00$CPMain$cAccountSettings$cPlan" id="ctl00_CPMain_cAccountSettings_cPlan" class="editText cPlan" autocompletetype="Disabled" maxlength="100" style="width: 300px;">
                <option selected="selected" value="Current" data-setupfee="0">Keep current plan</option>
                <option value="BasicFree" data-setupfee="0" data-monthlyfee="0" data-transactionfee="2.90% + 10.00 per ticket" data-monthlyfeeprorated="0" data-remainingsetupfee="0">Standard</option>
                <option value="Premium30" data-setupfee="1000" data-monthlyfee="1200" data-transactionfee="2.50% + 5.00 per ticket" data-monthlyfeeprorated="440.00" data-remainingsetupfee="1000">Premium (Paid Monthly)</option>
                <option value="PremiumAnnual" data-setupfee="0" data-monthlyfee="1000" data-transactionfee="2.50% + 0.00" data-monthlyfeeprorated="12000" data-remainingsetupfee="0">Premium (Paid Annually)</option>
            </select>
            <br />
            <div class="row" style="text-align: right;">
                <span class="cNewPlan" style="padding-left: 20px;">
                    <a class="btn btn-secondary" href="#" style="margin-left: 700px;">Cancel &amp; Keep Current Plan</a>
                </span>
            </div>
        </div>
        <br />
        <div class="row2" style="text-align: center;">
            <button class="btn btn-success btn-sm" style="width: 60px;">Save</button>
        </div>
    </span>
</div>