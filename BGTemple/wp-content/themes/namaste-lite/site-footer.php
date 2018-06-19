<?php 
wp_footer(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!--Drop Down Script-->	
<script>	
 function updateValue(){
    // find the dropdown
    var ddl = document.getElementById("seva");
    // find the selected option
    var selectedOption = ddl.options[ddl.selectedIndex];
    // find the attribute value
    var mailValue = selectedOption.getAttribute("value");
    // find the textbox
    var textBox = document.getElementById("amount");

    // set the textbox value
    if(mailValue=="Panchamritha Abhisheka"){
        textBox.value = "175/-";
    }
    else if(mailValue=="Rudrabhisheka"){
        textBox.value = "200/-";
    }
   else if(mailValue=="Navagraha Shanthi"){
     textBox.value = "1000/-";
   }
   else if(mailValue=="Kadubu Garland Alankara"){
     textBox.value = "2000/-";
   }
}
</script>
<script>
/* Validating Name*/
  function validateName() {
    var name = $("#Name").val();
    

    if (name.match(/^[a-zA-Z ]*$/))
        $("#divNameValidationResult").html("");
    else
         $("#divNameValidationResult").html("Enter Valid Name");
   
}

$(document).ready(function () {
   $("#Name").keyup(validateName);
});
  
/* Validating Email*/
  function validateEmail() {
    var email = $("#Email").val();
    

    if (email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/))
        $("#divEmailValidationResult").html("");
    else
         $("#divEmailValidationResult").html("Enter Valid Email For ex: xxxxx@example.com");
   
}

$(document).ready(function () {
   $("#Email").keyup(validateEmail);
});
  
/* Validating Mobile*/
  function validateMobile() {
    var mobile = $("#Mobile").val();
    

    if (mobile.match(/^[7-9]{1}[0-9]{9}$/))
        $("#divMobileValidationResult").html("");
    else
         $("#divMobileValidationResult").html("Enter valid Mobile Number");
   
}

$(document).ready(function () {
   $("#Mobile").keyup(validateMobile);
});
  
  /* Validating Zip*/
  function validateZip() {
    var zip = $("#Zip").val();
    

    if (zip.match(/^[1-9]{1}[0-9]{5}$/))
        $("#divZipValidationResult").html("");
    else
         $("#divZipValidationResult").html("Enter valid Zip");
   
}

$(document).ready(function () {
   $("#Zip").keyup(validateZip);
});
var today = new Date().toISOString().split('T')[0];
document.getElementsByName("Date")[0].setAttribute('min', today);
</script>

<!-- script for seva form -->

<script>
/* Validating Name*/
  function enquiryName() {
    var name = $("#Name").val();
    

    if (name.match(/^[a-zA-Z ]*$/))
        $("#divEnquiryNameValidationResult").html("");
    else
         $("#divEnquiryNameValidationResult").html("Enter Valid Name");
   
}

$(document).ready(function () {
   $("#Name").keyup(enquiryName);
});
  
/* Validating Email*/
  function enquiryEmail() {
    var email = $("#Email").val();
    

    if (email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/))
        $("#divEnquiryEmailValidationResult").html("");
    else
         $("#divEnquiryEmailValidationResult").html("Enter Valid Email For ex: xxxxx@example.com");
   
}

$(document).ready(function () {
   $("#Email").keyup(enquiryEmail);
});
  
/* Validating Mobile*/
  function enquiryMobile() {
    var mobile = $("#Mobile").val();
    

    if (mobile.match(/^[7-9]{1}[0-9]{9}$/))
        $("#divEnquiryMobileValidationResult").html("");
    else
         $("#divEnquiryMobileValidationResult").html("Enter valid Mobile Number");
   
}

$(document).ready(function () {
   $("#Mobile").keyup(enquiryMobile);
});
</script>
</body></html>