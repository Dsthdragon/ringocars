			<div class="" style="position: fixed; bottom:0; right:0; padding: 2rem 1rem;">
				<button class="btn btn-outline-primary" style="border-radius: 50%; border: .2rem solid; padding: 1rem; <?= (empty(session::get('compare')))? 'display: none;' : '' ?> " type="submit" id="compareButton" data-url="<?= URL ?>general_json/compareData">
					<span class="fa fa-exchange"></span>
				</button>
			</div>
			<footer class="p-4">
				<p class="float-right"><a href="#">Back to top</a></p>
				<p>© 2017 Copyright <?= NAME; ?>. <a href="#">Privacy</a> · <a href="#">Terms</a></p>
			</footer>
		</div>
	</div>


	<div class="modal fade" id="compareBox">
		<div class="modal-dialog" role="document" style="min-width: 90%">
			<div class="modal-content " style="color: black;">

				<div class="modal-body">
					<div id="compareHolder">

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Bootstrap core JavaScript ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<script>
		$(function() {
			$('#selectMyLink').change(function(){
				window.location.href = $(this).val();
			})

			$("#compareButton").click(function(){
				var url = $(this).data(url);
				$.get(url ,function(o){
					$("#compareBox").modal("show");
					$("#compareHolder").html(o);
				});
			})
		});
	</script>
</body>
</html>
