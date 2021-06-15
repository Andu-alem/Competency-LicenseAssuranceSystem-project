<link rel="stylesheet" href="css/admin.css" type="text/css"/>

<div id="mainnavigation" class="sec">
<ul>
  <li><a class="active" href="adminprofile.php">Profile</a></li>
  <li><a onclick="admin()" href="#">Manage Admin</a>
     <ul>
        <li id="ad1"><a href="adminadd.php">&#8594 Add Admin</a></li>
        <li id="ad2"><a href="admindeactivate.php">&#8594 Deactivate Admin</a></li>
        <li id="ad3"><a href="adminactivate.php">&#8594 Activate Admin</a></li>
        <li id="ad4"><a href="adminlist.php">&#8594 Admin List</a></li>
        <li id="ad5"><a href="adminhistory.php">&#8594 History</a></li>
   </ul>
   </li>
  <li><a onclick="College()" href="#">Manage College</a>
  <ul>
      <li id="col1"><a href="colladd.php">&#8594 Add College</a></li>
      <li id="col2"><a href="colldeactivate.php">&#8594 Deactive College</a></li>
      <li id="col3"><a href="collactivate.php">&#8594 Active College</a></li>
      <li id="col4"><a href="colllist.php">&#8594 College List</a></li>
      <li id="col5"><a href="collhistory.php">&#8594 History</a></li>
	  <li id="col6"><a href="deptassign.php">&#8594 Assign Department</a></li>
  </ul>
  </li>
  <li><a onclick="dep()" href="#">Manage Department</a>
   <ul>
      <li id="dep1"><a href="depadd.php">&#8594 Add Department</a></li>
      <li id="dep3"><a href="deplist.php">&#8594 Department List</a></li>
	  
   </ul>
   </li>
  <li><a onclick="feed()" href="#">Manage Feedbacks</a>
    <ul>
      <li id="feed1"><a href="feedbacks.php">&#8594 View Feedbacks</a></li>
      <li id="feed2"><a href="feeddelete.php">&#8594 Remove Feedbacks</a></li>
   </ul>
  <li><a href="adminchangepassword.php">Change password</a></li>

</ul>
</div>

<script>
function admin(){
  
  if(document.getElementById("ad1").style.display == "block"){
     document.getElementById("ad1").style.display = "none";
     document.getElementById("ad2").style.display = "none";
     document.getElementById("ad3").style.display = "none";
     document.getElementById("ad4").style.display = "none";
     document.getElementById("ad5").style.display = "none";
  }else{
     document.getElementById("ad1").style.display = "block";
     document.getElementById("ad2").style.display = "block";
     document.getElementById("ad3").style.display = "block";
     document.getElementById("ad4").style.display = "block";
     document.getElementById("ad5").style.display = "block";
  }
}

function College(){
  if(document.getElementById("col1").style.display == "block"){
     document.getElementById("col1").style.display = "none";
     document.getElementById("col2").style.display = "none";
     document.getElementById("col3").style.display = "none";
     document.getElementById("col4").style.display = "none";
     document.getElementById("col5").style.display = "none";
	 document.getElementById("col6").style.display = "none";
  }else{
     document.getElementById("col1").style.display = "block";
     document.getElementById("col2").style.display = "block";
     document.getElementById("col3").style.display = "block";
     document.getElementById("col4").style.display = "block";
     document.getElementById("col5").style.display = "block";
	 document.getElementById("col6").style.display = "block";
  }
}

function dep(){
  if(document.getElementById("dep1").style.display == "block"){
     document.getElementById("dep1").style.display = "none";
    
     document.getElementById("dep3").style.display = "none";
  }else{
     document.getElementById("dep1").style.display = "block";
     
     document.getElementById("dep3").style.display = "block";
    }
}

function feed(){
  if(document.getElementById("feed1").style.display == "block"){
     document.getElementById("feed1").style.display = "none";
     document.getElementById("feed2").style.display = "none";
  }else{
     document.getElementById("feed1").style.display = "block";
     document.getElementById("feed2").style.display = "block";
    }
}
</script>