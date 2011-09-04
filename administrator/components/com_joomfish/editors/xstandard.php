<script language="javascript" type="text/javascript">
	function copyToClipboard(value, action) {
		try {
			if (document.getElementById) {
				innerHTML="";
				if (action=="copy") {
					srcEl = document.getElementById("original_value_"+value);
					innerHTML = srcEl.innerHTML;
				}
				editorobj = document.getElementById("editor_"+value);
				editorobj.value = innerHTML;
			}
		}
		catch(e){
			alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT?>");
		}
	}
</script>
