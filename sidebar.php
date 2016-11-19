<?php
if(!isset($_SESSION['name']))
{
    ?>
<script>
    
  window.location.assign("index.php");
</script>
<?php
}
?>
<div class="sidebar">

  <!-- Logo Start -->
  <a href="index-2.html">
    <div class="logo-container" id="step1">
      <h1>YO!! PIZZA</h1>
      
    </div>
  </a>
  <!-- Logo End -->

  <!-- Sidebar User Profile Start -->
  <div class="sidebar-profile">
    <div class="user-avatar">
        <img src="_demo/images/profile-background-blurred.png" a />
    </div>
    <div class="user-info">
        <a href="#"><?=$_SESSION['name'] ?></a>
    </div>
  </div>

  <div class="responsive-menu">
    <a href="#"><i class="fa fa-bars"></i></a>
  </div>
  <!-- Sidebar User Profile End -->
<?php if($_SESSION['branch_id']==1)
{ ?>
  <!-- Menu Start -->
  <ul class="menu">
    <li class="lightblue">
      <a href="dash.php">
        <span class="menu-icon"><i class="fa fa-home"></i></span>
        <span class="menu-text">Dashboard</span>
        <span class="notification">4</span>
      </a>
    </li>
    
    <li class="parent lightyellow" id="loc">
      <a href="#">
        <span class="menu-icon"><i class="fa fa-map-marker"></i></span>
        <span class="menu-text">Location</span>
      </a>
      <ul class="child">
        <li id="addcountry" class="hlnk">
            <a href="country.php">Add Country</a>
        </li>
        <li id="upcountry" class="hlnk">
            <a href="country_search.php">Update Country</a>
        </li>
        <li id="addstate" class="hlnk">
            <a href="state.php">Add State</a>
        </li>
        <li id="upstate" class="hlnk"> 
            <a href="state_search.php">Update State</a>
        </li>
        <li id="addcity" class="hlnk">
            <a href="city.php">Add City</a>
        </li>
        <li id="upcity" class="hlnk">
            <a href="city_search.php">Update City</a>
        </li>
        <li id="addbranch" class="hlnk">
            <a href="branch.php">Add Branch</a>
        </li>
        <li id="upbranch" class="hlnk">
            <a href="branch_search.php">Update Branch</a>
        </li>
        
      </ul>
    </li>
    
    <li class="parent purple" class="hlnk">
      <a href="#">
        <span class="menu-icon"><i class="fa fa-desktop"></i></span>
        <span class="menu-text">Category</span>
      </a>
      <ul class="child">
        <li class="hlnk" id="cat">
            <a href="category.php">Add Category</a>
        </li>
        <li class="hlnk" id="upcat">
            <a href="category_search.php">Update Category</a>
        </li>
        
      </ul>
    </li>
    <li class="parent orange" class="hlnk">
      <a href="animated.html">
        <span class="menu-icon"><i class="fa fa-css3"></i></span>
        <span class="menu-text">Sub-Category</span>
      </a>
        
        <ul class="child">
        <li class="hlnk" id="subcat">
            <a href="subcategory.php">Add Sub-Cateogry</a>
        </li>
        <li id="upsubcat">
            <a href="subcat_search.php" class="hlnk" id="upsubcat">Update Sub-Category</a>
        </li>
        
      </ul>
    </li>
    <li class="parent lightred">
      <a href="#">
        <span class="menu-icon"><i class="fa fa-windows"></i></span>
        <span class="menu-text">Items</span>
      </a>
      <ul class="child">
        <li class="hlnk" id="items">
            <a href="item.php">Add Items</a>
        </li>
        <li class="hlnk" id="upitems">
            <a href="item_search.php">Update Items</a>
        </li>
        
      </ul>
    </li>
    <li class="parent lightyellow">
      <a href="support.html">
        <span class="menu-icon"><i class="fa fa-users"></i></span>
        <span class="menu-text">Ingredients</span>
      </a>
      <ul class="child">
        <li id="ingr">
            <a href="ingredient.php">Add Ingredients</a>
          
        </li>
        <li id="upingr">
            <a href="ingredient_search.php">Update Ingredients</a>
        </li>
      </ul>
    </li>
    <li class="parent green">
      <a href="#">
        <span class="menu-icon"><i class="fa fa-rocket"></i></span>
        <span class="menu-text">Employee</span>
      </a>
      <ul class="child">
          <li id="employee">
            <a href="employee.php">Add Employee</a>
        </li>
        <li id="upemployee">
            <a href="employee_search.php">Update Employee</a>
        </li>
        
      </ul>
    </li>
    <li class="parent blue">
      <a href="icons.html">
        <span class="menu-icon"><i class="fa  fa-asterisk"></i></span>
        <span class="menu-text">Size</span>
        
      </a>
      <ul class="child">
        <li id="size">
            <a href="size.php">Add Size</a>
        </li>
        <li id="upsize">
            <a href="size_search.php">Update Size</a>
        </li>
        
      </ul>
    </li>
    
  </ul>
  <!-- Menu End -->
<?php } else{
    
    ?>
  <ul class="menu">
           <li class="lightblue">
      <a href="dash.php">
        <span class="menu-icon"><i class="fa fa-home"></i></span>
        <span class="menu-text">Dashboard</span>
        <span class="notification">4</span>
      </a>
    </li>
<li class="lightgreen">
    <a href="order.php">
        <span class="menu-icon"><i class="fa fa-times-circle"></i></span>
        <span class="menu-text">Order</span>
        <span class="notification">4</span>
      </a>
    </li>

  </ul>
<?php } ?>
</div>
