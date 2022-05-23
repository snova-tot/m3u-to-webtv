<html lang="ua">

<head>
<link href="include.css" rel="stylesheet">
<script src="include.js" type="text/javascript"></script>
</head>

<body>

<h1>Онлайн конвертування з m3u до webtv</h1>

<div class="m3u_to_webtv_desc">Quick guest manual. 1) select the way to convert m3u: (m3u > WebTV List.txt) or (m3u > webtv_usr.xml) or (m3u > mtb_list.txt). 2) paste from the clipboard m3u list into the text field or load m3u file contents from your PC with the help of attach *.m3u button. 3) click button №3 with a green check mark in order to download the new converted file &#8628;</div>

<form action="convert.php" method="post">

<div><div style="float:left; font-size:50px; margin-top:-10px; line-height: initial;">1</div>
	<input type="radio" name="type" value="txt" checked>Конвертувати m3u > WebTV List.txt<br>
	<input type="radio" name="type" value="xml">Конвертувати m3u > webtv_usr.xml<br>
	<input type="radio" name="type" value="mtb">Конвертувати m3u > mtb_list.txt (beta)<br>	
	<input type="checkbox" name="m3u2mtbcoma" value="1"><span style="color:gray;">ставити кому після назви каналу в mtb_list.txt</span><br>
</div>
<br>

<div class="file-wrapper file-wrapper-m3u">
				<input type="file" name="file2convert" id="file2convert" onchange="tmp = this.value.substring(this.value.lastIndexOf('\\')+1); 
				tmp =  ((tmp.length > 30) ? (tmp.substring(0,30) + '...') : tmp );
				document.getElementById('file2convertbutton-clr').style.display = 'table-cell';
				if (tmp.length < 4) {
					tmp = '... загрузить *.m3u с компьютера?';
					document.getElementById('file2convertbutton-clr').style.display = 'none';				
					}
				
				document.getElementById('file2convertbuttonlabel').innerHTML = tmp;" onmouseover="document.getElementById('file2convertbuttonlabel').style.backgroundColor = '#D7D7D7'" onmouseout="document.getElementById('file2convertbuttonlabel').style.backgroundColor = '#EAEBEE'">

				<span id="file2convertbutton-clr" class="button-clr" style="display:none;" onclick="document.getElementById('file2convertbutton-clr').style.display = 'none'; document.getElementById('file2convert').value = ''; document.getElementById('file2convertbuttonlabel').innerHTML = '... завантажити *.m3u с комп\'ютера?'; document.getElementById('m3u').value = '';"><img src="img.del.png" style="cursor:pointer;"></span>		
				
				<span id="file2convertbuttonlabel" class="button" style="background-color: rgb(234, 235, 238);">... завантажити *.m3u з комп'ютера?</span>
				
		
				
			</div>

<div style="float:left; font-size:50px; margin-top:-9px; padding-right:10px; line-height: initial;">2 </div> До текстового поля вставте копіпастою або завантажте з комп'ютера плейліст M3U, котрий після натискання кнопки "Конвертувати плейліст" буде сконвертований для завантаження в новому форматі
<br />
<textarea id="m3u" name="m3u" style="width:100%" rows="25"></textarea>

<div class="div_button_convert">
	<input value="3. конвертувати плейліст" class="button button-comments button-convert" type="submit" style="width:250px; color: red; font-weight:bold; ">
</div>

</form>

</body>