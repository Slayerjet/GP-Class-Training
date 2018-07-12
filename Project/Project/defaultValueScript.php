<script type="text/javascript">
function InsertDefaultValues()
{
   // Leave this line as is. Customization follows.
   var FieldsAndDefault = new Array();

   // Customization:
   // For each field that will have custom information is 
   //   submitted blank, use this format:
   //     FieldsAndDefault.push("FieldIDvalue Default value");

   FieldsAndDefault.push("console_description name@example.com");
   FieldsAndDefault.push("console_review No cell phone");

   // End of customization.
   ///////////////////////////////////////
   for( var i=0; i<FieldsAndDefault.length; i++ )
   {
      FieldsAndDefault[i] = FieldsAndDefault[i].replace(/^\s*/,"");
      var pieces = FieldsAndDefault[i].split(" ");
      var field = pieces.shift();
      var f = document.getElementById(field);
      if( f.value.length < 1 ) { f.value = pieces.join(" "); }
   }
   return true;
}
</script>
<?php
header('location: addConsoleAction.php')
  
?>