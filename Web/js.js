var l1    = f.elements["list1"];
var l2    = f.elements["list2"];
var index = l1.selectedIndex;
if (index < 1)
   l2.options.length = 0;
else {
   var xhr_object = new XMLHttpRequest();

   xhr_object.open("POST", "species.php", true);
	
   xhr_object.onreadystatechange = function() {
      if (xhr_object.readyState == 4)
         eval(xhr_object.responseText);
   }

   xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
   var data = "family="+escape(l1.options[index].value)+"&form="+f.name+"&select=list2";
   xhr_object.send(data);
}
