		
		<script src="script/bootstrap.min.js"></script>
		<script src="script/bootbox.min.js"></script>

		<?php if(getPage() == "admin" || getPage() == "access"){?>
			<script src="script/nprogress.js"></script>
			<script>NProgress.start();</script>

			<!-- textarea resize -->
			<script src="script/textarea/autosize.min.js"></script>
			<script>
				autosize($('.resizable_textarea'));
			</script>
			
			<!-- Datatables -->
			<script src="script/datatables/js/jquery.dataTables.js"></script>
			<script>
				var asInitVals = new Array();
				$(document).ready(function () {
					
					var oTable = $('#table1, #table2, #tbl-bids-awards, #tbl-citizen-charters, #table-honors, #table-curriculum, #table-alumni, #table-transparency-seal, #table-downloads').dataTable({
						"oLanguage": {
							"sSearch": "Search items:"
						},
						'iDisplayLength': 10,
						"sPaginationType": "full_numbers",
						"dom": 'T<"clear">lfrtip'
					});
					$("tfoot input").keyup(function () {
						/* Filter on the column based on the index of this element's parent <th> */
						oTable.fnFilter(this.value, $("tfoot th").index($(this).parent()));
					});
					$("tfoot input").each(function (i) {
						asInitVals[i] = this.value;
					});
					$("tfoot input").focus(function () {
						if (this.className == "search_init") {
							this.className = "";
							this.value = "";
						}
					});
					$("tfoot input").blur(function (i) {
						if (this.value == "") {
							this.className = "search_init";
							this.value = asInitVals[$("tfoot input").index(this)];
						}
					});
				});
			</script>
			
			<!-- chart js -->
			<script src="script/chartjs/chart.min.js"></script>
			<!-- bootstrap progress js -->
			<script src="script/progressbar/bootstrap-progressbar.min.js"></script>
			<script src="script/nicescroll/jquery.nicescroll.min.js"></script>
			<!-- icheck -->
			<script src="script/icheck/icheck.min.js"></script>
			<!-- daterangepicker -->
			<script type="text/javascript" src="script/moment.min.js"></script>
			<script type="text/javascript" src="script/datepicker/daterangepicker.js"></script>
			<script >
				$(document).ready(function(){
					 $('#single_cal3').daterangepicker({
						singleDatePicker: true,
						calender_style: "picker_3"
					}, function (start, end, label) {
						console.log(start.toISOString(), end.toISOString(), label);
					});
					
				});
			</script>
			<script src="script/custom.js"></script>

			<!-- flot js -->
			<!--[if lte IE 8]><script type="text/javascript" src="script/excanvas.min.js"></script><![endif]-->
			<script src="script/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
			<script >
			$(function(){
				$(".textarea").wysihtml5();	
			});
			</script>
			
			<script>NProgress.done();</script>
			<!-- /datepicker -->
			<!-- /footer content -->	
		<?php }else{?>
			<script type="text/javascript">
				$(document).ready(function (){
					$(window).scroll(function () {
						if ($(document).scrollTop() <= 40) {
							$('#header-full').removeClass('small');
							$('.tabs-blur').removeClass('no-blur');
							$('#main-header').removeClass('small');
							$('#rshs-text-logo').show();
						} else {
							$('#header-full').addClass('small');
							$('.tabs-blur').addClass('no-blur');
							$('#main-header').addClass('small');
							$('#rshs-text-logo').hide();
						}
					});
					
					$("a[data-rel^='prettyPhoto']").prettyPhoto({
						default_width: 600,
						default_height: 420,
						social_tools: false
					});
					
					$('#slideshow-tabs').tabs({ show: { effect: "fade", duration: 200 }, hide: { effect: "fade", duration: 300 } });
					$('.slider-tabs.flexslider').flexslider({
						animation: "slide",
						pauseOnAction: true,
					});
					$('a[data-rel]').each(function() {
						$(this).attr('rel', $(this).data('rel'));
					});
					
					$( ".accordion" ).accordion({
						heightStyle: "content"
					});
					
					 $('#slider-event.flexslider').flexslider({
						animation: "slide",
						pauseOnAction: true
					});
		
					$('#slider-news.flexslider').flexslider({
						animation: "slide",
						pauseOnAction: true
					});
		
					$('img[data-retina]').retina({checkIfImageExists: true});
					$(".open-menu").click(function(){
						$("body").addClass("no-move");
					});
					$(".close-menu, .close-menu-big").click(function(){
						$("body").removeClass("no-move");
					});
				});
				</script>

		<?php }?>
		
	</body>
</html>