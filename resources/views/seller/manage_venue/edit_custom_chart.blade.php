@extends('layouts.seller_app')
@section('title','OCEANSTUB')
@section('top_scripts')
@endsection
@section('style')
<style>
						.tools {
							clear: both;
						    display: table;
						    content: "";
						    margin-left: 4px;
						    border: 1px solid #0089ff;
						    position: absolute;
    						/*bottom: 0px;*/
    						top: 58px;
    						z-index: 9;
    						background: #fff;
    						box-shadow: 0 6px 12px rgb(0 0 0 / 18%);
						}
						.tools ul {
							padding-left: 0px;
						    clear: both;
						    display: table;
						    content: "";
						    max-width: 100px;
						    margin-bottom: 0px;
						}
						.tools ul li {
							list-style: none;
							float: left;
							width: 50px;
							height: 50px;
							color: #a59696;
							text-align: center;
							line-height: 45px;
							border: 1px solid #e4e1e1;
							cursor: pointer;
						}
						.tools i {
							color: #a59696;
						}
						.min-100 {
							min-height: 700px!important;
							background-color: #f4f6f9;
						}
						body {
							overflow: hidden;
						}
						.drawing-area {
							width: 60vw;
						    height: 75vh;
						    background-color: #fff;
						    margin: 15px auto;
						    border: 3px solid #000;
						    overflow: hidden;
						}
					</style>
@endsection
@section('content')
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<script type="text/javascript">
	
</script>
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.seller_navbar')
      <!-- /.navbar -->
      <!-- Main Sidebar Container -->
      @include('layouts.seller_sidebar')
      <!-- /Main Sidebar Container -->
      <div class="content-wrapper min-100" style="margin-top: 68px;">
      	<div>
			<!-- seating-chart drawing area-->
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="{{ asset('assets/seller/seatingchart/seating-chart.css') }} ">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <style type="text/css">
        </style>
      <script type="text/javascript">
            $(function () {
                $("#stageoptions" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#generaladmissionoptions" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#tablewithoutchairoptions" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#tablewithchairoptions" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#section" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#rowpopup" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#editorerrorpopup" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#seatpopup" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#Other" ).dialog({
                    autoOpen: false,
                    modal: true
                });
                $("#Otherrename" ).dialog({
                    autoOpen: false,
                    modal: true
                });
            });
        </script>
        <div class="cnc">
          <input class="shaperotator w-360" type="range" name="rangeInput" value="0" min="0" max="360" oninput="updateTextInput(this.value);" onchange="updateTextInput(this.value);">
          <div class="individual-seat-details-for-table-with-seats tooltips">
              <p class="seatno mt-0"></p>
              <p class="avaliability"></p>
          </div>
          <div class="seating-chart-tooltips tooltips">
              <ul>
                  <li id="SectionAdd" class="menuboxoptions">Add Section (theater style)</li>
                  <li id="AddGeneralAdmissionSection" class="menuboxoptions">Add General Admission Section</li>
                  <li id="addtablewithoutseats" class="menuboxoptions">Add Table (w/o seat numbers)</li>
                  <li id="addtablewithseats" class="menuboxoptions">Add Table (with seat numbers) <br>or<br>Add individual seats</li>
                  <li id="addstageorshpe" class="menuboxoptions">Add Stage/Shape</li>
                  <li id="other" class="menuboxoptions">Other</li>
              </ul>
          </div>
          <div class="stage-edit-tooltips tooltips">
              <ul>
                  <li id="editshape" class="menuboxoptions">Edit shape</li>
                  <li id="deletestage" class="menuboxoptions">Delete shape</li>
                  <li id="Rotate" class="menuboxoptions">Rotate shape</li>
                  <li id="duplicateshape" class="menuboxoptions">Duplicate shape</li>
                  <!-- <li id="resize" class="menuboxoptions">Resize</li> -->
              </ul>
          </div>
          <div class="other-edit-tooltips tooltips">
              <ul>
                  <li id="Rename" class="menuboxoptions">Rename other</li>
                  <li id="deleteother" class="menuboxoptions">Delete other</li>
                  <li id="Rotate" class="menuboxoptions">Rotate other</li>
                  <!--  <li id="editshape" class="menuboxoptions">Edit other</li> -->
                  <!-- <li id="duplicateshape" class="menuboxoptions">Duplicate other</li> -->
                  <!-- <li id="resize" class="menuboxoptions">Resize</li> -->
              </ul>
          </div>
          <div class="ga-edit-tooltips tooltips">
              <ul>
                  <li id="editga" class="menuboxoptions">Edit GA section</li>
                  <li id="deletega" class="menuboxoptions">Delete GA section</li>
                  <li id="Rotate" class="menuboxoptions">Rotate GA section</li>
                  <li id="duplicatega" class="menuboxoptions">Duplicate GA section</li>
                  <!-- <li id="" class="menuboxoptions">Make all GA sections same size</li> -->
              </ul>
          </div>
          <div class="tablewithoutchai-edit-tooltips tooltips">
              <ul>
                  <li id="edittablewithoutchair" class="menuboxoptions">Edit table</li>
                  <li id="deletetablewithoutchair" class="menuboxoptions">Delete table</li>
                  <li id="Rotate" class="menuboxoptions">Rotate table</li>
                  <li id="duplicatetablewithoutchair" class="menuboxoptions">Duplicate table</li>
                  <!-- <li id="" class="menuboxoptions">Make all tables same size</li> -->
              </ul>
          </div>
          <div class="tablewithchair-edit-tooltips tooltips">
              <ul>
                  <li id="editseatgroup" class="menuboxoptions">Edit Seat_Group</li>
                  <li id="deleteseatgroup" class="menuboxoptions">Delete Seat_Group</li>
                  <li id="Rotate" class="menuboxoptions">Rotate Seat_Group</li>
                  <li id="duplicateseatgroup" class="menuboxoptions">Duplicate Seat_Group</li>
                  <!-- <li id="" class="menuboxoptions">Make all Seat_Groups same size</li> -->
              </ul>
          </div>
          <div class="section-edit-tooltips tooltips">
              <ul>
                  <li id="editsection" class="menuboxoptions">Edit section</li>
                  <li id="deletesection" class="menuboxoptions">Delete section</li>
                  <li id="Rotate" class="menuboxoptions">Rotate section</li>
                  <li id="duplicatesection" class="menuboxoptions">Duplicate section</li>
                  <li id="addrow" class="menuboxoptions">Add Row</li>
                  <!-- <li id="" class="menuboxoptions">Make all Seat_Groups same size</li> -->
              </ul>
          </div>
          <div id="stageoptions" title="Stage">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="stagename" type="text" maxlength="20">
                  </div>
                  <!-- <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Border color :</label>
                      <input class="h-30" type="color" id="stagebordercolor" name="favcolor" value="#333">
                  </div> -->
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Fill color :</label>
                      <input class="h-30" type="color" id="stagefillcolor" name="favcolor" value="#eed189">
                  </div>
                  <div class="row GAOnly shapeOnly seatgroupOnly">
                      <label class="ocean-stub-blue">Shape:</label>
                      <br>
                      <div class="imgSelector imgSelectorstage shapeSelector">
                          <img src="{{ asset('assets/seller/seatingchart/images/circle_stage.png') }}" class="bnc circle_tablestage" data-value="circle_tablestage" class="selected">
                          <img  src="{{ asset('assets/seller/seatingchart/images/pentagon_stage.png') }}" class="bnc pentagon_tablestage" data-value="pentagon_tablestage">
                          <img src="{{ asset('assets/seller/seatingchart/images/hexagon_stage.png') }}" class="bnc hexagon_tablestage"  data-value="hexagon_tablestage" class="seatgroupOnly shapeOnly">
                      </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget stage-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="Other" title="Other">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="othername" type="text" maxlength="20">
                  </div>
                  <div class="row GAOnly shapeOnly seatgroupOnly">
                      <label class="ocean-stub-blue">Shape:</label>
                      <br>
                      <div class="imgSelector otherimage">
                          <span title="Wheel Chair" class="selected wheelchair" data-other="wheelchair">
                              <img class="hst-50" style="border-radius: 50%;" data-other="wheelchair" src="{{ asset('assets/seller/seatingchart/images/wheel.png') }}">
                          </span>
                          <span title="Exit">
                              <img class="hst-50" data-other="exit" src="{{ asset('assets/seller/seatingchart/images/exit.png') }}">
                          </span>
                          <span title="Men Toilet">
                              <img class="hst-50" data-other="mantoilet" src="{{ asset('assets/seller/seatingchart/images/mantoilet.svg') }}">
                          </span>
                          <span title="Women Toilet">
                              <img class="hst-50" data-other="womentoilet" src="{{ asset('assets/seller/seatingchart/images/womentoilet.svg') }}">
                          </span>
                          <span title="Mixed Toilet">
                              <img class="hst-50" data-other="toiletmanwomen"  src="{{ asset('assets/seller/seatingchart/images/toiletmanwomen.svg') }}">
                          </span>
                      </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget other-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="Otherrename" title="Other Rename">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="otherrename" type="text" maxlength="20">
                  </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget other-renamesave">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="generaladmissionoptions" title="General Admission Section">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Sale Priority:</label>
                      <select id="salepriorityforgeneraladmission">
                          <option value="1" selected="selected">1 (Best section)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10 (Not as good)</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="generaladmissionname" type="text" maxlength="20">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Fill color :</label>
                      <input class="h-30" type="color" id="generaladmissionfillcolor" name="favcolor" value="#999999">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="maxcapacity">Max. Capacity:</label>
                      <input id="maxcapacitynumper" type="number" min="1">
                  </div>
                  <div class="row GAOnly shapeOnly seatgroupOnly">
                      <label class="ocean-stub-blue">Shape:</label>
                      <br>
                      <div class="imgSelector imgSelectorgeneraladmission shapeSelector">
                          <span  class="shapeselection bsp circle_table" data-value="circle_table">
                              <span class="shape circle shapeselection" data-value="circle_table">
                              </span>
                          </span>
                          <span class="shapeselection bsp rectangle_table" data-value="rectangle_table" class="">
                              <span class="shape square shapeselection">
                              </span>
                          </span>
                          <span class="shapeselection bsp elipsce_table" data-value="elipsce_table">
                              <span class="shape roundedSquare shapeselection"></span>
                          </span>
                      </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget general-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="tablewithoutchairoptions" title="Table (w/o seat numbers)">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Sale Priority:</label>
                      <select id="salepriorityfortablewithoutchair">
                          <option value="1" selected="selected">1 (Best section)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10 (Not as good)</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="tablewithoutchairname" type="text" maxlength="20">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="fromseatfortablewithoutchair">From seat:</label>
                      <input id="fromseatfortablewithoutchair" type="number" min="1">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue"for="Toseatfortablewithoutchair">To seat:</label>
                      <input id="Toseatfortablewithoutchair" type="number" min="1">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Fill color :</label>
                      <input class="h-30" type="color" id="tablewithoutchairfillcolor" name="favcolor" value="#999999">
                  </div>
                  <div class="row GAOnly shapeOnly seatgroupOnly">
                      <label class="ocean-stub-blue">Shape:</label>
                      <br>
                      <div class="imgSelector tableSelectorwithoutchair">
                          <img class="selected circle_tablewithoutchair mnc selected" src="{{ asset('assets/seller/seatingchart/images/tablecircle.png') }}" data-value="circle_tablewithoutchair">
                          <img class="square_tablewithoutchair mnc" src="{{ asset('assets/seller/seatingchart/images/tablesquare.png') }}" data-value="square_tablewithoutchair">
                          <img class="rectangle_tablewithoutchair mnc"  src="{{ asset('assets/seller/seatingchart/images/tablerectangle.png') }}" data-value="rectangle_tablewithoutchair">
                          <img class="corner_tablewithoutchair mnc"  src="{{ asset('assets/seller/seatingchart/images/tablecorner.png') }}" data-value="corner_tablewithoutchair">
                      </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget tablewithoutchair-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="tablewithchairoptions" title="Add Table (with seat numbers)">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Sale Priority:</label>
                      <select id="salepriorityfortablewithchair">
                          <option value="1" selected="selected">1 (Best section)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10 (Not as good)</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="tablewithchairname" type="text" maxlength="20">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="fromseatfortablewithoutchair">From seat:</label>
                      <input id="fromseatfortablewithchair" type="number" min="1">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="Toseatfortablewithchair">To seat:</label>
                      <input id="Toseatfortablewithchair" type="number" min="1">
                  </div>
                  <div class="row">
                          <label class="ocean-stub-blue" for="cSectionName">Seat fill color :</label>
                          <input class="h-30" type="color" id="tablewithchairfillcolorseat" name="favcolor" value="#dddddd">
                      </div>
                  <div class="row GAOnly shapeOnly seatgroupOnly">
                      <label class="ocean-stub-blue" >Shape:</label>
                      <br>
                      <div class="imgSelector imgSelectortablewithchair shapeSelector">
                          <span data-value="noShape" class="seatgroupOnly selected">
                              <span class="shape" style="background-image:url('images/tableno.png');background-position:center;">
                              </span>
                          </span>
                          <span class="knmc circle_table" data-value="circle_table">
                          <span class="shape circle" data-value="circle_table">
                          </span>
                          </span>
                          <span class="knmc rectangle_table" data-value="rectangle_table">
                          <span class="shape square">
                          </span>
                          </span>
                          <span class="knmc elipsce_table"  data-value="elipsce_table">
                          <span class="shape roundedSquare"></span>
                          </span>
                          <span class="knmc l-shaped-table" data-value="l-shaped-table" class="seatgroupOnly shapeOnly">
                          <span class="shape corner">
                          <span class="shapeInner1"></span>
                          <span class="shapeInner2"></span>
                          </span>
                          </span>
                      </div>
                      <div class="row">
                          <label class="ocean-stub-blue" for="cSectionName">Shape fill color :</label>
                          <input class="h-30" type="color" id="tablewithchairfillcolor" name="favcolor" value="#eed189">
                      </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget tablewithchair-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="section" title="Sections">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Sale Priority:</label>
                      <select id="salepriorityforsection">
                          <option value="1" selected="selected">1 (Best section)</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                          <option value="6">6</option>
                          <option value="7">7</option>
                          <option value="8">8</option>
                          <option value="9">9</option>
                          <option value="10">10 (Not as good)</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Name:</label>
                      <input id="sectionname" type="text" maxlength="20">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Alignment:</label>
                      <select id="alignmentforsection">
                          <option value="0">Left</option>
                          <option value="1">Center</option>
                          <option value="2">Right</option>
                      </select>
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Sell Preference:</label>
                      <select id="sellpreferenceforsection">
                          <option value="0">Left to Right</option>
                          <option value="1">Right to Left</option>
                      </select>
                  </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget section-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="rowpopup" title="Add / Edit Row">
              <fieldset class="ui-dialog-content ui-widget-content shape">
                  <div class="row" style="border-bottom:1px solid #ccc; padding-bottom:5px;margin-bottom:10px;font-size:90%;">
                      <i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp; You are adding / editing a row. To edit a seat, click on the seat and not on the empty space in the row.
                  </div>
                  <div class="row">
                      <label>Seat Configuration:</label>
                  </div>
                  <div class="row">
                      <select id="cOddEven">
                          <option value="1" selected="selected">All</option>
                          <option value="2">Odd (1,3,5)</option>
                          <option value="3">Even (2,4,6)</option>
                      </select>
                      <select id="ascdes">
                          <option value="1" selected="selected">1,2,3,4,5</option>
                          <option value="2">5,4,3,2,1</option>
                      </select>
                      <!-- <select id="cSeatOrder">
                          <option value="1" selected="selected">1,2,3,4,5</option>
                          <option value="2">5,4,3,2,1</option>
                          <option value="3">5,3,1,2,4</option>
                          <option value="4">4,2,1,3,5</option>
                      </select> -->
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue" for="cSectionName">Row Name:</label>
                      <input id="rowname" type="text" maxlength="20">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue mr-8" for="fromseatfortablewithoutchair">From seat:</label>
                      <input id="fromseatforrow" type="number" min="1">
                  </div>
                  <div class="row">
                      <label class="ocean-stub-blue mr-28" for="Toseatfortablewithchair">To seat:</label>
                      <input id="Toseatforrow" type="number" min="1">
                  </div>
              </fieldset>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <!-- <button type="button" class="ui-button ui-corner-all ui-widget insert-row-below" style="display: none;">Insert Row Below</button> -->
                      <button type="button" class="ui-button ui-corner-all ui-widget delete-row" style="display: none;">Delete Row</button>
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget row-save">
                          <div class="spinner"><i class="fa  fa-spinner fa-spin"></i></div>Save</button>
                      <button type="button" class="nsBtn hasIcon ui-button ui-corner-all ui-widget row-edit-save-save" style="display: none;">Save</button>
                      <button type="button" class="ui-button ui-corner-all ui-widget dailog-cancel">Cancel</button>
                  </div>
              </div>
          </div>
          <div id="seatpopup" title="Edit Seat">
              <div class="row" style="border-bottom:1px solid #ccc; padding-bottom:5px;margin-bottom:10px;font-size:90%;">
                  <i class="fa fa-lightbulb-o"></i>&nbsp;&nbsp; You are editing a seat. To edit a row or to insert a row, click on the empty space in the row and not on the seat.
              </div>
              <div class="row">
                  <label>Section / row / seat:</label>
                  <label id="cSelectedSectionRowSeat" style="font-weight:bold;"><span class="sectioname"></span> / <span class="rowname"></span> /<span class="seat"></span></label>
              </div>
              <div class="row">
                  <input type="checkbox" id="cHideSeat" class="w-15">
                  <label for="cHideSeat">This seat is not available. Hide it.</label>
              </div>
              <div class="row cHideIfHidden notavhideshow">
                  <input type="checkbox" id="cRestricted" class="w-15">
                  <label for="cRestricted">This seat has restricted view.</label>
              </div>
              <div class="row notavhideshow">
                  <input type="checkbox" id="righseatpixadd" class="w-15">
                  <label for="cHideSeat">Shift to right by 20px</label>
              </div>
              <div class="row cHideIfHidden notavhideshow">
                  <label for="cAccessibilityLevel">Accessibility:</label>
                  <br>
                  <select id="cAccessibilityLevel" style="max-width:350px;">
                      <option value="0">Regular. Available to everybody</option>
                      <option value="1">Accessible. Removable seat. Available to wheelchairs and non-wheelchairs</option>
                      <option value="2">Accessible. Fixed seat. Available to non-wheelchairs</option>
                      <option value="3">Accessible. No seat. Wheelchairs only</option>
                  </select> 
              </div>
              <!-- <div class="row" id="cOtherHiddenSeats">
                  <label>Other unavailable (hidden) seats in the row: (click to make available)</label>
                  <div>
                      <span>12</span>
                  </div>
              </div> -->
              <div class="row ">
                  <button id="cUpdateSeat" class="nsBtn medium utility">Update Seat</button>
              </div>
              <P class="hidenseatdetails"></P>
              <!-- <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn primary medium ui-button ui-corner-all ui-widget alert-close-btn">OK</button>
                  </div>
              </div> -->
          </div>
          <div id="editorerrorpopup" title="Missing Information">
              <div class="cShowDialog ui-dialog-content ui-widget-content" id="ui-id-9" style="width: auto; min-height: 6.744px; max-height: 298.744px; height: auto;">
                  <i class="fa fa-2x fa-times-circle" style="color:#df341f;"></i>&nbsp;&nbsp;&nbsp;Enter valid data.
              </div>
              <div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix">
                  <div class="ui-dialog-buttonset">
                      <button type="button" class="nsBtn primary medium ui-button ui-corner-all ui-widget alert-close-btn">OK</button>
                  </div>
              </div>
          </div>
          <div id="play-ground"></div>


       <form id="Editseating_chart_form">
        @isset($sc)
          <textarea id="sketchpaddata" name="SeatingChartData" style="display:none"; rows="5" cols="5" value="{{$sc->seating_chart_data}}"></textarea>

          <input style="width: 24%;margin: 6px 2px 2px 6px;" type="text" placeholder="Seating chart name" value="{{$sc->seating_chart_name}}" class="chartname form-control" name="SeatingChartName">
          <input type="hidden" name="id" value="{{$sc->id}}">
          @endisset

          <span class="text-danger error-text SeatingChartName_error"></span>

          <div class="form-check" style="top:49px;position:absolute;margin-left:13px;">
         <input class="form-check-input" type="radio" name="publish" value="0"

{{$sc->publish_type == 0 ? 'checked' : ''}}
          >
        <label class="form-check-label">Public</label>
          </div>

            <div class="form-check" style="top:49px;position:absolute;margin-left:97px;">
         <input class="form-check-input" type="radio" name="publish" value="1" 
         {{$sc->publish_type == 1 ? 'checked' : ''}}>
        <label class="form-check-label">Private</label>
          </div>

          <button type="submit" class="btn btn-success seatingchartSvebtn">Save Changes</button>
          <span class="text-danger error-text SeatingChartData_error"></span>
       </form>

        </div>
      </div>	
		</div>
       </div>


         <!-- footer -->
         @include('layouts.seller_footer')
      <!-- /footer -->
</div>      
@endsection
@section('bottom_scripts')
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js
"></script>
<script src="https://unpkg.com/konva@7.0.3/konva.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="{{ asset('assets/seller/seatingchart/seating-chart.js') }} "></script> -->
<script src="{{ asset('assets/seller/seatingchart/edit-seating-chart.js') }} "></script>
<script>
    $(document).ready(function () {
        $("#Editseating_chart_form").submit(function (stay) {
            stay.preventDefault();
        
            var formdata = $(this).serialize();
            $.ajaxSetup({ headers: { "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content") } });
            $.ajax({
                type: "POST",
                url: "{{route('seller.post_EditSeatingChart')}}",
                data: formdata,
                cache: false,
                processData:false,
                dataType:'json',
                /*contentType:false,*/

                beforeSend:function(){
                $(document).find('span.error-text').text('');
                },
                success: function(data)
                {
                if (data.status == 0) {
                $.each(data.error,function(prefix,val)
                {

                $('span.'+prefix+'_error').text(val[0]);
                });

                }
                else{
                alert(data.msg);
              
                }
              },
            });
        });
    });
</script>

@endsection