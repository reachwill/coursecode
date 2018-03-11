<script 
src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js">
</script>

<script>
$(document).ready(function(){
	$('table').hide().fadeIn(3000);
});

</script>



<style>
body{
	font-family:Arial, Helvetica, sans-serif;	
}

.error{
	color:red;
	font-weight:bold;	
}


.mainNav ul{
	list-style:none;
	margin:0;
	padding:0;	
}

.mainNav ul li{
	display:inline-block;
	margin-left:30px;
}

.mainNav ul li a{
	text-decoration:none;
	border:1px solid #ccc;
	width:85px;
	display:block;
	padding:4px;
	text-align:center;
	color:#fff;
	font-weight:bold;
	border-radius:7px;
	-moz-border-radius:7px;
	-webkit-border-radius:7px;
	-o-border-radius:7px;
	-ms-border-radius:7px;
	background: #4c4c4c; /* Old browsers */

background: -moz-linear-gradient(top,  #4c4c4c 0%, #595959 12%, #666666 25%, #474747 39%, #2c2c2c 50%, #000000 51%, #111111 60%, #2b2b2b 76%, #1c1c1c 91%, #131313 100%); /* FF3.6+ */

background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#4c4c4c), color-stop(12%,#595959), color-stop(25%,#666666), color-stop(39%,#474747), color-stop(50%,#2c2c2c), color-stop(51%,#000000), color-stop(60%,#111111), color-stop(76%,#2b2b2b), color-stop(91%,#1c1c1c), color-stop(100%,#131313)); /* Chrome,Safari4+ */

background: -webkit-linear-gradient(top,  #4c4c4c 0%,#595959 12%,#666666 25%,#474747 39%,#2c2c2c 50%,#000000 51%,#111111 60%,#2b2b2b 76%,#1c1c1c 91%,#131313 100%); /* Chrome10+,Safari5.1+ */

background: -o-linear-gradient(top,  #4c4c4c 0%,#595959 12%,#666666 25%,#474747 39%,#2c2c2c 50%,#000000 51%,#111111 60%,#2b2b2b 76%,#1c1c1c 91%,#131313 100%); /* Opera 11.10+ */

background: -ms-linear-gradient(top,  #4c4c4c 0%,#595959 12%,#666666 25%,#474747 39%,#2c2c2c 50%,#000000 51%,#111111 60%,#2b2b2b 76%,#1c1c1c 91%,#131313 100%); /* IE10+ */

background: linear-gradient(to bottom,  #4c4c4c 0%,#595959 12%,#666666 25%,#474747 39%,#2c2c2c 50%,#000000 51%,#111111 60%,#2b2b2b 76%,#1c1c1c 91%,#131313 100%); /* W3C */

filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4c4c4c', endColorstr='#131313',GradientType=0 ); /* IE6-9 */


}


table{
	border:2px solid #69C;
	border-collapse:collapse;	
}

th{
	background-color:#69C;
	color:white;
	text-shadow:1px 1px 1px #000;	
}

th,td{
	padding:5px;
	vertical-align:top;
	text-align:left;
	
}

tr:nth-child(odd){
	background-color:#ccc;	
}

.amount{
	text-align:right;
	font-weight:bold;	
}




</style>

<header>
    <h1>Company Name</h1>
    <nav class="mainNav">
    	<ul>
    		<li><a href="#">home</a></li>
        	<li><a href="#">products</a></li>
            <li><a href="#">location</a></li>
        </ul>
    </nav>
</header>
