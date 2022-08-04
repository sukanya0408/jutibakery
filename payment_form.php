<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title></title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	</head>
	<body>
		<div class="container">
			<div  class="row">
				<div class="col-sm-12">
					<br><br>
				<h4>ชำระเงิน</h4>
			</div>			
					</div>
					<div class="form-group row" id="ifcash" style="display: none;">		 
							<label for="bank">เลือกธนาคารที่โอนเงิน</label>
							<select name="bank" class="form-control">
								<option value="">เลือกธนาคารที่โอนเงิน</option>
								<option value="1">bank1</option>
								<option value="2">bank2</option>
								<option value="3">bank3</option>
							</select> 
					</div>
					<div class="form-group row">
						<label for="amount">จำนวนเงิน</label>
						<input type="number" name="amount" required min="0" class="form-control">
					</div>
					<div class="form-group row">
						<button type="submit" class="btn btn-primary">SAVE</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		function yesnoCheck(that) {
				if (that.value == "โอนเงิน") {
					document.getElementById("ifcash").style.display = "block";
		} else {
					document.getElementById("ifcash").style.display = "none";
			}
		}
		</script>
		
	</body>
</html>
Cr.https://stackoverflow.com/questions/29321494/show-input-field-only-if-a-specific-option-is-selected