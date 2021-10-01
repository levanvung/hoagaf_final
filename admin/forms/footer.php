<script>
    function toggleChildren(id) {

   var elem = document.getElementById(id);
   if(!elem) alert("error: not found!");
   else {

      if(elem.style.display == "block")
         elem.style.display = "none";

      else
         elem.style.display = "block";
   }
}
</script>