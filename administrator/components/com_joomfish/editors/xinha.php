<script language="javascript" type="text/javascript">
	function copyToClipboard(value, action) {
		try {
			if (document.getElementById) {
				innerHTML="";
				if (action=="copy") {
					srcEl = document.getElementById("original_value_"+value);
					innerHTML = srcEl.innerHTML;
				}
				editorobj = eval("Xinha_editor_"+value);
				if ( typeof(editorobj)=="object") {
					editorobj.setHTML( innerHTML);
				}
				else {
					if (window.clipboardData){
						window.clipboardData.setData("Text",innerHTML);
						alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_COPIED?>");
					}
					else {
						srcEl = document.getElementById("text_origText_"+value);
    	       			srcEl.value = innerHTML;
        	   			srcEl.select();
						alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_COPY?>");
					}
				}				
			}
		}
		catch(e){
			alert("<?php echo _JOOMFISH_ADMIN_CLIPBOARD_NOSUPPORT?>");
		}
	}
</script>
