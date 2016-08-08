<html>
<head>
<script> 
var maxAmount = 250;
function textCounter(textField, showCountField) {
    if (textField.value.length > maxAmount) {
        textField.value = textField.value.substring(0, maxAmount);
	} else { 
        showCountField.value = maxAmount - textField.value.length;
	}
}
</script>
</head>
<body>
<form>
<textarea name="ta" rows="6" style="width:340px;" onKeyDown="textCounter(this.form.ta,this.form.countDisplay);" onKeyUp="textCounter(this.form.ta,this.form.countDisplay);"></textarea>
<br>
<input readonly type="text" name="countDisplay" size="3" maxlength="3" value="250"> Characters Remaining
</form>
</body>
</html>