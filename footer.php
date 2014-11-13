<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Mission Atletica
 */
?>
	</div>
</div>
</div>
		<div class="row footer">
			<div class="container">
				<div class="row">
					<div class="col-md-8">
						<ul class="left-footer">
							<li>Providing running shoes and running races for the youth of Guatemala.</li>
							<li><a href="/">Mission Atletica</a> is a 501C(3) non-profit organization. Marin Link Inc. serves as the fiscal sponsor.</li>
						</ul>
					</div>
					<div class="col-md-4 right-footer">
						<p>&copy; <a href="/">Mission Atletica</a>, <?= date("Y"); ?>. All rights reserved.</p>
					</div>
				</div>
			</div>
		</div>
<?php wp_footer(); ?>
<script type="text/javascript">
function handleMonthlyDonation()
{
	// reset applicable form inputs
	var strAmount = document.getElementById("pp_amount").value;
	document.getElementById("pp_donations").disabled = true;
	document.getElementById("pp_subscription").disabled = true;
	document.getElementById("pp_a3").disabled = true;
	document.getElementById("pp_p3").disabled = true;
	document.getElementById("pp_t3").disabled = true;

	if(strAmount.length && document.getElementById("pp_src").checked)
	{
		// recurring monthly payments
		document.getElementById("pp_subscription").disabled = false;
		document.getElementById("pp_a3").value = strAmount;
		document.getElementById("pp_a3").disabled = false;
		document.getElementById("pp_p3").disabled = false;
		document.getElementById("pp_t3").disabled = false;
	}
	else
	{
		// one-time payment
		document.getElementById("pp_donations").disabled = false;
	}
}
( function( $ ){
	$('.selectpicker').selectpicker();
	handleMonthlyDonation();
	$("#pp_src").on("click", handleMonthlyDonation);
	$("#pp_amount").on("change", handleMonthlyDonation);
} )( jQuery );
</script>
</body>
</html>
