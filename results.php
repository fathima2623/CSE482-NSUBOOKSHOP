<!DOCTYPE html>
<html lang="en">
<head> 
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Results</title>
    <style>
       
       *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: sans-serif;
}
          
          
section{
  width: 100%;
  height: 110px;
  background-image: url(image/bg.png);
  background-size: cover;
  background-position: center;
}

section nav .logo{

float: left;
margin-left: 20px;
}

section nav ul{
  float: right;
  margin-top: 40px;
  margin-right: 20px;
font-size: large;
font-weight: bold;}

section nav{
  width: 100%;
  display: block;
 
  box-shadow: 0 0 10px #089da1;
  /* background: #fff; */
  background:black;
  position: fixed;
  left: 0;
  z-index: 100;
}

section nav .logo img{
  width: 100px;
  cursor: pointer;
  margin: 8px 0;
}

section nav ul{
  list-style: none;
}

section nav li{
  display: inline-block;
  padding: 0 10px;
}

section nav li a{
  text-decoration: none;
  color: white;
}

section nav li a:hover{
  color: #089da1;}



/** search bar **/
.search{
  display: block;
  background-color:#089da1;
  margin-top: 50px;
 height: 40px;
 border-radius: 10px;
 box-shadow:#089da1;
  margin: auto;
  width: 50%;
}

.searchTerm{
  width: 90%;
  height: inherit;
  border-radius: 10px;
}

.search input[type=text] {
  padding: 6px;
  margin-top: 4px;
  font-size: 17px;
  border: none;
  width: 90%;
  margin-left: 5px;
}

.search button {
  float: right;
  padding: 4px 6px;
  margin-top: 6px;
  margin-right: 13px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.search button:hover {
  background:white
}

/* courses */

.courses{
  width: 100%;
  height: auto;
  margin-bottom: 35px;
  margin-top: 10px;
}

.courses h1{
  font-size: 50px;
  text-align: center;
  margin-bottom: 35px;
}



.courses .courses_box{
  width: 95%;
  margin: 0 auto;
  display: grid;
  height: auto;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
  grid-gap: 25px 0;
}

.courses .courses_box .courses_card{
  width: 250px;
  height: 350px;
  text-align: center;
  padding: 5px;
  border: 1px solid #919191;
  margin: auto 20px;
}

.courses .courses_box .courses_card:hover{
  box-shadow: 0 0 5px #089da1;
}

.courses .courses_box .courses_card .courses_image{
  width: 150px;
  height: 220px;
  margin: 0 auto;
  cursor: pointer;
  box-shadow: 0 0 8px rgba(0,0,0,0.5);
  overflow: hidden;
}

.courses .courses_box .courses_card .courses_image img{
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  transition: 0.3s;
}

.courses .courses_box .courses_card:hover .courses_image img{
  transform: scale(1.1);
}

.courses .courses_box .courses_card .courses_tag p{
  font-family: queen of camelot;
  font-size: 20px;
  margin: 8px 0;
  margin-bottom: 15px;
  
}

.courses .courses_box .courses_card .courses_tag H3{
  font-family: queen of camelot;
  font-size: 15px;
  margin: 8px 0;
  margin-bottom: 8px;
  
}


.courses .courses_box .courses_card .courses_tag .courses_btn{
  padding: 8px 20px;
 
  border: 2px solid #089da1;
  text-decoration: none;
  color: #000;
}

.courses .courses_box .courses_card .courses_tag .courses_btn a{
margin-top: 5px;
}

@media screen and (max-width: 600px) {
  
  section {
    display: block;
    width: 100%;
    height: 500px;
  }

  section nav .logo, section nav ul, section nav li{
    float: none;
    display: block;
    text-align: center;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
  section nav li{
    border: 1px solid white;
  }

  section nav li a:hover{
    color: #089da1;
  }

  .search{
    float: none;
    display: block;
    width: 100%;
    margin:0px;
  }
  
  .courses .courses_box, .courses .courses_box .courses_card {

   display: block;
   width: 100%;



  }

  section nav {
    position: relative;
  }
 


}

</style>

</head>
<body>
    <section>
        <nav>

            <div class="logo">
                <img src="Logo.png">
            </div>
    
            <ul>
              <li><a href="Home.html">Home</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="search.html">Search</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="checkout.html"></a>Cart</li>
              <li><a href="Wishlist.html"></a>Wishlist</li>
          </ul>
  
    
            
    
          </nav>

       
    </section>

   
      <div class="search">
        <form action="product.html">
        <input type="text" class="" placeholder="What are you looking for?">
        <button type="submit" class="searchButton">
          <i class="fa fa-search"></i>
       </button>
       </form>
     </div>
   
     
      <div class="courses">
        <h1>Courses</h1>
    
        <div class="courses_box">
    
            <div class="courses_card">
                <div class="courses_image">
                   <img src="https://dev.java/assets/images/java-logo-vert-blk.png" alt="">
                </div>
                <div class="courses_tag">
                    <h3>CSE215</h3>
                    <p>Introduction to Java</p>
                    
                    <a href="product.html" class="courses_btn">Search</a>
                </div>
            </div>
    
            <div class="courses_card">
                <div class="courses_image">
                   <img src="https://www.mheducation.co.in/media/catalog/product/cache/84c63a40cf0771f03c9446b22a7e0f08/9/7/9789389811988.jpeg" alt="">
                </div>
                <div class="courses_tag">
                    <h3>FIN433</h3>
                    <p>Financial Markets and Institutions</p>
                    
                    <a href="product.html" class="courses_btn">Search</a>
                </div>
            </div>
    
            <div class="courses_card">
                <div class="courses_image">
                   <img src="https://m.media-amazon.com/images/I/51pL7oinmVL._SX320_BO1,204,203,200_.jpg" alt="">
                </div>
                <div class="courses_tag">
                    <h3> ACT370 </h3>
                    <p>Taxation</p>
                    
                    <a href="#" class="courses_btn">Search</a>
                </div>
            </div>
    
            <div class="courses_card">
                <div class="courses_image">
                   <img src="https://pandorafms.com/blog/wp-content/uploads/2018/05/what-is-an-algorithm-featured.png" alt="">
                </div>
                <div class="courses_tag">
                    <h3>CSE373</h3>
                    <p>Algorithms</p>
                    
                    <a href="#" class="courses_btn">Search</a>
                </div>
            </div>
    
            <div class="courses_card">
                <div class="courses_image">
                   <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
                </div>
                <div class="courses_tag">
                    <h3>MAT125</h3>
                    <p>Linear Algebra</p>
                    
                    <a href="#" class="courses_btn">Search</a>
                </div>
            </div>

            <div class="courses_card">
              <div class="courses_image">
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
              </div>
              <div class="courses_tag">
                  <h3>MAT125</h3>
                  <p>Linear Algebra</p>
                  
                  <a href="#" class="courses_btn">Search</a>
              </div>
          </div>
          <div class="courses_card">
            <div class="courses_image">
               <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
            </div>
            <div class="courses_tag">
                <h3>MAT125</h3>
                <p>Linear Algebra</p>
                
                <a href="#" class="courses_btn">Search</a>
            </div>
        </div>
        <div class="courses_card">
          <div class="courses_image">
             <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
          </div>
          <div class="courses_tag">
              <h3>MAT125</h3>
              <p>Linear Algebra</p>
              
              <a href="#" class="courses_btn">Search</a>
          </div>
      </div>
      <div class="courses_card">
        <div class="courses_image">
           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
        </div>
        <div class="courses_tag">
            <h3>MAT125</h3>
            <p>Linear Algebra</p>
            
            <a href="#" class="courses_btn">Search</a>
        </div>
    </div>
    <div class="courses_card">
      <div class="courses_image">
         <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
      </div>
      <div class="courses_tag">
          <h3>MAT125</h3>
          <p>Linear Algebra</p>
          
          <a href="#" class="courses_btn">Search</a>
      </div>
  </div>
  <div class="courses_card">
    <div class="courses_image">
       <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjdBGj7n8A2Mg-RyhAFcY8IKhsQYTybh4oAg&usqp=CAU" alt="">
    </div>
    <div class="courses_tag">
        <h3>MAT125</h3>
        <p>Linear Algebra</p>
        
        <a href="#" class="courses_btn">Search</a>
    </div>
</div>

    
            
    
        
    
          
    
        </div>
    
    </div>
     
  

    
</body>
</html>