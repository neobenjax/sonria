<style>
/* Main menu */
.menu{
	float:left;
    margin: 0;
    padding: 0;
    list-style: none;  
    background: #000;
	text-align:center;
}

.menu li{
    float: left;
    padding: 0;
    position: relative;
    line-height: 0;
}
/*AQUÍ PUEDES DARLE FORMATO A LOS BOTONES DEL MENÚ PRINCIPAL*/
.menu a{
    float: left;
	width:100px;
	color: #fff;
	font: 100%/1.4 myText, Verdana, Arial, Helvetica, sans-serif;
	font-weight:bold;
    text-decoration: none;
	background:#C00;
	padding:4px 0 0 0;
	margin-right:1px;
}

/*FORMATO A LOS BOTONES DEL MENÚ PRINCIPAL AL PASAR EL CURSOR*/
.menu li:hover > a
{
    color: #fafafa;
	background: #F00;
}
.menu li:hover > ul
{
    display: block;
	
}

/* COMIENZA SUBMENÚ */
.menu ul
{
    list-style: none;
    margin: 0;
	
    padding: 0;    
    display: none;
    position: absolute;
    top: 26px;
    left: 0;
    z-index: 99999;  
}
.menu ul ul
{
  top: 0;
  left: 0;
}

.menu ul li
{
    float: none;
    margin: 0;
	
    padding: 0;
    display: block;  
}
.menu ul li:last-child
{   
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none;    
}

/*AQUÍ PUEDES DARLE FORMATO A LOS BOTONES DEL SUBMENÚ*/
.menu ul a{

    padding: 7px 0;
    height: auto;
    line-height: 1;
    display: block;
    white-space: nowrap;
    float: none;
    text-transform: none;
}

/*FORMATO A LOS BOTONES DEL SUBMENÚ AL PASAR EL CURSOR*/
.menu ul a:hover
{
    background: #F00;
}

.menu ul li:first-child > a
{

}

.menu ul li:first-child a:hover
{
    border-bottom-color: #04acec; 
}

.menu ul ul li:first-child a:hover
{
    border-right-color: #04acec; 
    border-bottom-color: transparent;   
}


.menu ul li:last-child > a
{
   
}

/* Clear floated elements */
.menu:after 
{
    visibility: hidden;
    display: block;
    font-size: 0;
    content: " ";
    clear: both;
    height: 0;
}

</style>

<ul class="menu">
    <li> <a href="#" title="Menu 1">Menu 1</a></li>
   	    <li> <a href="#" title="Menu 2" onclick="return true">Menu 2</a>
      <ul>
        <li> <a href="#" title="Submenu 1">Submenu 1</a></li>
        <li> <a href="#" title="Submenu 2">Submenu 2</a></li>
        <li> <a href="#" title="Submenu 3">Submenu 3</a></li>
        <li> <a href="#" title="Submenu 4">Submenu 4</a></li>
        <li> <a href="#" title="Submenu 5">Submenu 5</a></li>
      </ul>
  </li>
   	  <li> <a href="#" title="Menu 3">Menu 3</a></li>
   	  <li> <a href="#" title="Menu 4">Menu 4</a></li>
      
  
    
  
</ul>
