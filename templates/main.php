<?php if(!defined("PROTECT")) { exit("STOP!"); } ?>

            

<div id="add-payments-binder">

		<div class="add-payments-inner">
			<div class="add-payments-icon"><span id="add-payment" onclick="">ADD PAYMENT</span></div>
				<div class="add-payments-spacer"></div>
				<div class="add-payments-filterby">
					<input type="text" id="anyPropertyInput" value="filter by any property..." onclick="if(this.value == 'filter by any property...') {this.value='';}" onblur="if(this.value == '') {this.value = 'filter by any property...';} " />
				</div>
			<div class="add-payments-extended"><div id="filtershowhide" class="extended-filter-button">extended filters</div></div>
		</div>

</div>



<div id="filter-binder">
<div class="filterarrow"></div>
	<div class="filter-binder-inner">
		<div class="filter-by-category">
			<div class="filterbycategory-inner">
				<span class="filtersFont">filter by category</span>
				<div class="buttons-container">
					<div class='filtercategorybutton' id="c1" onclick="filterForAll(this.id);" style='width:125px;'>mobile services</div>
					<div class='filtercategorybutton' id="c2" onclick="filterForAll(this.id);" style='width:83px; margin-left:16px;'>gasoline</div>
					<div class='filtercategorybutton' id="c3" onclick="filterForAll(this.id);" style='width:63px; margin-left:16px;'>food</div>
					<div class='filtercategorybutton' id="c4" onclick="filterForAll(this.id);" style='width:73px; margin-left:16px;'>charity</div>
					<div class='filtercategorybutton' id="c5" onclick="filterForAll(this.id);" style='width:73px; margin-top:15px;'>transport</div>
				</div>
			</div>
		</div>

		<div class="filter-by-date">
			<div class="filterbydate-inner">
				<span class="filtersFont">filter by date</span>
				<input class="filtersFont" type="text" name="from" value="from" onclick="this.value='';" />
				<input class="filtersFont" type="text" name="to" value="to" onclick="this.value='';" />
			</div>
		</div>

		<div class="filter-by-amount">
			<div class="filterbyamount-inner">
				<span class="filtersFont">filter by amount</span>
				<input class="filtersFont" type="text" name="from" value="from" onclick="this.value='';" />
				<input class="filtersFont" type="text" name="to" value="to" onclick="this.value='';" />
			</div>
		</div>

	</div>

</div>



<div id="recordsFound"><span id ="totalrecords">0</span><span> records found</span></div>

<div id="results-binder">

	<div class="results-left" id="scroll">
		




	</div> <!-- results-left end -->

	<div class="results-right">

		<div class="topdiv">
			<div class="rightdiv-headline">payments per month</div>
				<div class="bargraph-container">

					<div class="graph">
						<div style="left:29px;height: 170px;" id="m0" class="bar"></div>
						<div style="left:65px;height: 170px;" id="m1" class="bar"></div>
						<div style="left:101px;height: 6px;" id="m2" class="bar"></div>
						<div style="left:137px;height: 49px;" id="m3" class="bar"></div>
						<div style="left:173px;height: 28px;" id="m4" class="bar"></div>
						<div style="left:209px;height: 120px;" id="m5" class="bar"></div>
						<div style="left:245px;height: 11px;" id="m6" class="bar"></div>
						<div style="left:281px;height: 6px;" id="m7" class="bar"></div>
						<div style="left:317px;height: 49px;" id="m8" class="bar"></div>
						<div style="left:352px;height: 28px;" id="m9" class="bar"></div>
						<div style="left:388px;height: 49px;" id="m10" class="bar"></div>
						<div style="left:426px;height: 28px;" id="m11" class="bar"></div>
					</div>

					<div class="graph-footer">
						<div class="month">Jan</div>
						<div class="month">Feb</div>
						<div class="month">Mar</div>					
						<div class="month">Apr</div>
						<div class="month">May</div>
						<div class="month">Jun</div>
						<div class="month">Jul</div>
						<div class="month">Aug</div>
						<div class="month">Sep</div>
						<div class="month">Oct</div>
						<div class="month">Nov</div>
						<div class="month">Dec</div>					
					</div>

				</div>
		</div>

		<div class="bottomdiv">
			<div class="rightdiv-headline">payments per category</div>
				<div class="bargraph-container">

					<div class="graph">
						<div style="left:29px;height: 170px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:65px;height: 170px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:101px;height: 6px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:137px;height: 49px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:173px;height: 28px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:209px;height: 120px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:245px;height: 11px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:281px;height: 6px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:317px;height: 49px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:352px;height: 28px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:388px;height: 49px;" class="bar"><div class="bar-percent">11.00</div></div>
						<div style="left:426px;height: 28px;" class="bar"><div class="bar-percent">11.00</div></div>
					</div>

					<div class="graph-footer">
						<div class="month">Jan</div>
						<div class="month">Feb</div>
						<div class="month">Mar</div>					
						<div class="month">Apr</div>
						<div class="month">May</div>
						<div class="month">Jun</div>
						<div class="month">Jul</div>
						<div class="month">Aug</div>
						<div class="month">Sep</div>
						<div class="month">Oct</div>
						<div class="month">Nov</div>
						<div class="month">Dec</div>					
					</div>

				</div>
		
		</div>
		
	</div> <!--results-right end -->


	<div class="results-bottom">
		<div class="total-title">Total:</div> 
		<div class="total-amount" id="totalAmount">83.60</div>
	</div>


</div> <!-- results-binder end -->

<div style="clear:both;"></div>


</div> <!-- main-div end -->







<!-- Add-payment-window start -->

<div id="add-payment-window" class="payment-window">

	<div class="window-content">

		<div class="window-header">
			<span class="close">&times;</span>
			<span class="header-text">ADD NEW PAYMENT</span>
		</div>
		
		<div class="input-container">
			<div class="input-single" style="width:265px;">
				<span>Title:</span>
				<input type="text" name="title" id="paymentTitle" />
			</div>
			<div class="input-single" style="width:135px; float:right;">
				<span>Amount:</span>
				<input type="text" name="amount" id="paymentAmount" onkeyup="this.value = this.value.replace(/[^0-9.]/g, '');" />
			</div>

			<div class="input-single">
				<span>Category:</span>
				<select name="category" id="paymentCategory">
				<?=Payment::getCategoryList();?>
				</select>
			</div>

			<div class="input-single">
				<span>Date:</span>
				<input type="text" name="date" id="paymentDate" style="background:url(/templates/images/calendar-icon.jpg) no-repeat right center; " />
			</div>

			<div class="input-single" style="height:115px;">
				<span>Comment:</span>
				<textarea name="comment" id="paymentComment" rows="3" cols="15" style="height:91px;"></textarea>
			</div>

			<div class="input-single" style="width:130px; float:right; height:91px; padding-top:35px">
				<input type="button"  value="CREATE" id="add-payment-button" />
			</div>

		</div>


	</div>

</div>

<!-- Add-payment-window End -->

